import nltk.classify.util
from nltk.classify import NaiveBayesClassifier
from nltk.corpus import names
import pandas as pd
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
stop_words = set(stopwords.words('english'))

#helper functions
#function to format dataset
def word_feats(words):
    return dict([(word, True) for word in words])

#function to take input stop-word,stemming
def take_input():
    sentence = input()
    sentence = sentence.lower()

    #tokenization
    word_tokens = word_tokenize(sentence)

    #stopword filtering
    words = [w for w in word_tokens if not w in stop_words]
    return words

#function to predict
def predict(words):
    neg = list()
    pos = list()
    neu = list()
    for word in words:
        classResult = classifier.classify(word_feats(word))

        if classResult == 'pos':
            #print("positive "+word)
            pos.append(word)

        elif classResult == 'neg':
            #print("negative "+word)
            neg.append(word)
        else:
            #neutral word
            neu.append(word)

    try:
        #print("pos",pos)
        #print("neg",neg)
        pos=str(float(len(pos))/len(words))
        neg=str(float(len(neg))/len(words))
        neu=str(float(len(neu))/len(words))
    except:
        pos=0.5
        neg=0
        neu=0.5

    #print('Positive: ' + pos)
    #print('Negative: ' + neg)

    print({'pos':pos,'neg':neg,'neu':neu})



#loading datsets
positive_data=pd.read_csv("datasets/good-words.txt").abound.tolist()

negative_data=pd.read_csv("datasets/bad-words.csv").jigaboo.tolist()
negative_data=negative_data+pd.read_csv("datasets/en.csv").words.tolist()

#feature extraction
negative_features = [(word_feats(neg), 'neg') for neg in negative_data]
positive_features = [(word_feats(pos), 'pos') for pos in positive_data]
#


#training
train_set = negative_features + positive_features

#clasifier
classifier = NaiveBayesClassifier.train(train_set)


#prediction
while True:
    print("input")
    predict(take_input())
