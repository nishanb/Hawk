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
    anger = list()
    disgust=list()
    fear=list()
    joy=list()
    sadness=list()
    surprise=list()

    for word in words:
        classResult = classifier.classify(word_feats(word))

        #ekman's 6 emotions
        if classResult == 'anger':
            anger.append(word)
        elif classResult == 'disgust':
            disgust.append(word)
        elif classResult == 'fear':
            fear.append(word)
        elif classResult == 'joy':
            joy.append(word)
        elif classResult == 'sadness':
            sadness.append(word)
        elif classResult == 'surprise':
            surprise.append(word)

    try:
        anger=str(float(len(anger))/len(words))
        disgust=str(float(len(disgust))/len(words))
        fear=str(float(len(fear))/len(words))
        joy=str(float(len(joy))/len(words))
        sadness=str(float(len(sadness))/len(words))
        surprise=str(float(len(surprise))/len(words))
    except:
        anger=1/6
        disgust=1/6
        fear =1/6
        joy=1/6
        sadness=1/6
        surprise=1/6

    print({'anger':anger,'disgust':disgust,'fear':fear,'joy':joy,'sad':sadness,'surprise':surprise})

#loading datsets
anger_data=pd.read_csv("datasets/emo_anger_s.txt").abhor.tolist()
disgust_data=pd.read_csv("datasets/emo_disgust_s.txt").abhorr.tolist()
fear_data=pd.read_csv("datasets/emo_fear_s.txt").affright.tolist()
joy_data=pd.read_csv("datasets/emo_joy_s.txt").admir.tolist()
sadness_data=pd.read_csv("datasets/emo_sadness_s.txt").aggriev.tolist()
surprise_data=pd.read_csv("datasets/emo_surprise_s.txt").admir.tolist()

#feature extraction
anger_features = [(word_feats(anger), 'anger') for anger in anger_data]
disgust_features = [(word_feats(disgust), 'disgust') for disgust in disgust_data]
fear_features = [(word_feats(fear), 'fear') for fear in fear_data]
joy_features = [(word_feats(joy), 'joy') for joy in joy_data]
sadness_features = [(word_feats(sadness), 'sadness') for sadness in sadness_data]
surprise_features = [(word_feats(surprise), 'surprise') for surprise in surprise_data]


#training
train_set = anger_features+disgust_features+fear_features+joy_features+sadness_features+surprise_features
#clasifier
classifier = NaiveBayesClassifier.train(train_set)


#prediction
while True:
    print("input")
    predict(take_input())
