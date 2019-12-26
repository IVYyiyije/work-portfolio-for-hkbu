
# coding: utf-8

# In[1]:

import requests
import os
import re
from pyquery import PyQuery as pq


# In[ ]:




# In[2]:

def get_data(url):
    res = requests.get(url)
    doc = pq(res.content)
    return doc  #用get_data函数，通过调用requests,pyquery模块获取网页数据，用return来保存数据

def content_write(content,filename):
    #将文字写入文件，刷取页面是中文的，需要设置编码，用列表来将抓取到的文字写入txt文档
        with open(filename,"w",encoding='utf-8') as f:
            for i in range (len(content)): 
                f.write(content[i])
                f.write('\n')
                f.write('\n')
            f.close()
def pic_write(content,filename):
    #将图片写入txt文件，用切片来过滤
    file = open(filename,'w+')
    for k in range (len(content)):    
        file.write(content[k][24:-1]+'\n')
    file.close()
    
def mkdir(new_path):
       # new_path=path+title[j]
        if not os.path.exists(new_path):  
            try:
                os.mkdir(new_path)
            except FileNotFoundError:
                pass   #因为存在有些页面中并没有文字


# In[ ]:




# In[3]:

root='http://skqs.guoxuedashi.com'  #国学大师根目录，通过字符串拼接来获得url编码
doc=get_data(root)
url=[pq(sq).attr('href') for sq in doc('.dd3 a')]   #获得下一级页面的相对路径列表
title=[pq(st).text() for st in doc('.clearfix .dd3 a')]  #获得下一级页面所抓取的内容的标题
for h in range(4):
    path = "F:\\sikuquanshu\\"           #存取的文件路径
    new_path=path+title[h]      #根据之前抓取的标题内容拼接成新的文件路径
    mkdir(new_path)     #依据文件路径创建文件夹
    urll=root+url[h]      #通过把相对路径和根目录拼接起来获取绝对路径
    doc=get_data(urll)    #利用函数访问每一个次级页面的绝对路径从而获取每一个次级页面的数据
    url1=[pq(sq).attr('href') for sq in doc('.dd3 a')]  #接下来的二级循环和一级循环一样
    title1=[pq(st).text() for st in doc('.dd3 a')]
    for j in range(len(url1)):
        new_path1=new_path+"\\"+title1[j]
        mkdir(new_path1)
        url2=root+url1[j]
        docc=get_data(url2)
        url3=[pq(sq).attr('href') for sq in docc('.info_cate a')]
        title2=[pq(st).text() for st in docc('.info_cate a')]
        for i in range(len(url3)):
            new_path2=new_path1+"\\"+title2[i]
            mkdir(new_path2) 
            url4=root+url3[i]
            doccc=get_data(url4)
            #name=doccc(".info_tree a").text()
            text_name=title2[i]  #用获取的标题作为新建的文档的命名
            cc=doccc('.tline').text()
            content=re.sub("[A-Za-z0-9\!\%\[\]\,\。]", "", cc)  #用正则表达式过滤无用字段
            ccc=content.split('-') #文字
            pq(doccc('script')[-6]).text()  #定位要爬取的文字
            aaaa = pq(doccc('script')[-6]).text()
            m=re.search('imglist.+png\'\;',aaaa)  #获取要爬取的文字
            try:
                n=m.group(0).split(';') #group（0）获取正则表达式表达的整体结果
                filename_text=new_path2+"\\"+text_name+'.txt' #
                filename_pic=new_path2+"\\"+text_name+'_picsource.txt'
                content_write(ccc, filename_text)
                pic_write(n, filename_pic)
            except AttributeError:           
                pass   #因为有些页面是用图片的形式而不是文本的形式存取数据，所以要进行判断，若是遇到图片则跳过
            continue


# In[ ]:



