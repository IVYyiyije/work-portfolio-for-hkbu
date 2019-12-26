
# coding: utf-8

# In[1]:

import requests
import os
import re
from pyquery import PyQuery as pq

def get_data(url):
    res = requests.get(url)
    #from pyquery import PyQuery as pq
    doc = pq(res.content)
    return doc

def content_write(content,filename):
    #将文字写入文件
        with open(filename,"w",encoding='utf-8') as f:
            for i in range (len(content)): 
                f.write(content[i])
                f.write('\n')
            f.close()
            
def pic_write(content,filename):
    #将图片src写入txt文件
    file = open(filename,'w+')   
    file.write(content)
    file.close()
    
def mkdir(new_path):
       # new_path=path+title[j]
        if not os.path.exists(new_path):  
            try:
                os.mkdir(new_path)
            except FileNotFoundError:
                pass


# In[ ]:




# In[2]:

root='http://www.guoxuedashi.com'
kangxi='/kangxi'
doc=get_data(root+kangxi)
url=[pq(sq).attr('href') for sq in doc('.table2 td a')]
title=[pq(st).text() for st in doc('.table2 td a')]   #与四库全书的标签不同
for h in range(len(url)):
    path = "F:\\kangxi_dic\\"   #存取地址
    new_path=path+title[h]
    mkdir(new_path)
    urll=root+url[h]
    doc=get_data(urll)
    url1=[pq(sq).attr('href') for sq in doc('.info_txt2.clearfix a')]
    title1=[pq(st).text() for st in doc('.info_txt2.clearfix a')]
    for j in range(len(url1)):
        new_path1=new_path+"\\"+title1[j]
        mkdir(new_path1)
        url2=root+url1[j]
        docc=get_data(url2)
        text_name=title1[j]
        try:
            pic_src=docc('.info_txt2.clearfix img').attr('src')  
            a=docc('.info_txt2.clearfix p').text()
            if(a==None):
                continue          #有些字过于生僻，国学大师网站并没有收录介绍，所以要进行判断所爬取的内容是否为空
            else:
                b=a.split('\n')
                filename_pic=new_path1+"\\"+text_name+'_picsource.txt'
                filename_text=new_path1+"\\"+text_name+'_text.txt'
                pic_write(pic_src,filename_pic)
                content_write(b,filename_text)
            
        except AttributeError:
                pass
        continue
    


# In[ ]:



