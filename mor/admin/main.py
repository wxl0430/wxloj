#!/usr/bin/python
# coding=utf-8
import tkinter
import tkinter as tk
from tkinter import *
import os
from tkinter import messagebox
mk=os.getcwd().split("\\")
mk="\\".join(mk[0:len(mk)-2])+'\\'
print(mk)
mlist=[]
mmlist=[]
def adduser():
    window = tk.Tk()
    window.title("adduser")
    window.geometry("400x400")
    window.resizable(False, False)
    list=Listbox(window,height=21,selectmode=SINGLE)
    list.selection_set(0)
    list.place(x=10, y=10,width=250)
    list.delete(0, END)
    def update():
        li=os.listdir(mk+"mor\\password\\")
        # print(li)
        global mlist
        mlist=[]
        for i in li:
            a = []
            # print(i)
            with open(mk+"mor\\password\\"+i, "r",encoding="utf-8") as fr:
                for line in fr:
                    a.append(line.replace('\n', ''))
            a=a[0]
            # print(a)
            if "等待管理员确认：" in a:
                mlist.append(i)
        # print(li)
        list.delete(0,END)
        for i in mlist:
            list.insert(END, i.replace(".pw",""))
    update()
    def ok():
        i=list.get(ACTIVE)+".pw"
        a=[]
        with open(mk+"mor\\password\\"+i, "r",encoding="utf-8") as fr:
            for line in fr:
                a.append(line.replace('\n', ''))
        a=a[0]
        f=open(mk+"mor\\password\\"+i,"w",encoding="utf-8")
        f.write(a.replace("等待管理员确认：",""))
        f.close()
        update()
    def unok():
        i = list.get(ACTIVE) + ".pw"
        a = []
        with open(mk + "mor\\password\\" + i, "r",encoding="utf-8") as fr:
            for line in fr:
                a.append(line.replace('\n', ''))
        a = a[0]
        f = open(mk + "mor\\password\\" + i, "w",encoding="utf-8")
        f.write(a.replace("等待管理员确认：", "管理员驳回了你的注册请求："))
        f.close()
        update()
    def allok():
        for i in mlist:
            a = []
            with open(mk + "mor\\password\\" + i, "r", encoding="utf-8") as fr:
                for line in fr:
                    a.append(line.replace('\n', ''))
            a = a[0]
            f = open(mk + "mor\\password\\" + i, "w", encoding="utf-8")
            f.write(a.replace("等待管理员确认：", ""))
            f.close()
        update()
    def allunok():
        for i in mlist:
            a = []
            with open(mk + "mor\\password\\" + i, "r", encoding="utf-8") as fr:
                for line in fr:
                    a.append(line.replace('\n', ''))
            a = a[0]
            f = open(mk + "mor\\password\\" + i, "w", encoding="utf-8")
            f.write(a.replace("等待管理员确认：", "管理员驳回了你的注册请求："))
            f.close()
        update()
    adduser_button = Button(window, text="通过", command=ok)
    adduser_button.place(x=300,y=50)
    adduser_button = Button(window, text="拒绝", command=unok)
    adduser_button.place(x=300,y=100)
    adduser_button = Button(window, text="全部通过", command=allok)
    adduser_button.place(x=300,y=150)
    adduser_button = Button(window, text="全部拒绝", command=allunok)
    adduser_button.place(x=300,y=200)
    adduser_button = Button(window, text="刷新", command=update)
    adduser_button.place(x=300, y=250)
    window.mainloop()
def banuser():
    window = tk.Tk()
    window.title("banuser")
    window.geometry("400x400")
    window.resizable(False, False)
    list=Listbox(window,height=21,selectmode=SINGLE)
    list.selection_set(0)
    list.place(x=10, y=10,width=250)
    list.delete(0, END)
    ent=tk.Entry(window, width=15)
    ent.place(x=280,y=10)
    def update():
        li=os.listdir(mk+"mor\\password\\")
        # print(li)
        global mlist,mmlist
        mlist=[]
        mmlist=[]
        for i in li:
            if i!='admin.pw':
                mlist.append(i)
                a = []
                # print(i)
                with open(mk + "mor\\password\\" + i, "r", encoding="utf-8") as fr:
                    for line in fr:
                        a.append(line.replace('\n', ''))
                a = a[0]
                # print(a)
                if "ERROR_BANED:" in a:
                    mmlist.append(1)
                else:
                    mmlist.append(0)
        # print(li)
        list.delete(0,END)
        for i in range(0,len(mlist)):
            list.insert(END, mlist[i].replace(".pw","")+" "+"-BAN"*mmlist[i])
    update()
    def ok():
        i=list.get(ACTIVE)+".pw"
        i=i.replace(" -BAN","").replace(" ","")
        a=[]
        with open(mk+"mor\\password\\"+i, "r",encoding="utf-8") as fr:
            for line in fr:
                a.append(line.replace('\n', ''))
        a=a[0]
        if not "ERROR_BANED:" in a:
            f=open(mk+"mor\\password\\"+i,"w",encoding="utf-8")
            f.write("ERROR_BANED:"+ent.get()+" "+a)
            f.close()
        update()
    def unok():
        i = list.get(ACTIVE) + ".pw"
        i=i.replace(" -BAN","")
        a = []
        with open(mk + "mor\\password\\" + i, "r",encoding="utf-8") as fr:
            for line in fr:
                a.append(line.replace('\n', ''))
        a = a[0]
        print(a)
        if "ERROR_BANED:" in a:
            f=open(mk+"mor\\password\\"+i,"w",encoding="utf-8")
            f.write(a.split(" ")[-1])
            f.close()
        update()
    def allok():
        for i in mlist:
            a = []
            with open(mk + "mor\\password\\" + i, "r", encoding="utf-8") as fr:
                for line in fr:
                    a.append(line.replace('\n', ''))
            a = a[0]
            if not "ERROR_BANED:" in a:
                f = open(mk + "mor\\password\\" + i, "w", encoding="utf-8")
                f.write("ERROR_BANED:" + ent.get() + " " + a)
                f.close()
        update()
    def allunok():
        for i in mlist:
            a = []
            with open(mk + "mor\\password\\" + i, "r", encoding="utf-8") as fr:
                for line in fr:
                    a.append(line.replace('\n', ''))
            a = a[0]
            if "ERROR_BANED:" in a:
                f = open(mk + "mor\\password\\" + i, "w", encoding="utf-8")
                f.write(a.split(" ")[-1])
                f.close()
        update()
    adduser_button = Button(window, text="封禁", command=ok)
    adduser_button.place(x=300,y=50)
    adduser_button = Button(window, text="解封", command=unok)
    adduser_button.place(x=300,y=100)
    adduser_button = Button(window, text="全部封禁", command=allok)
    adduser_button.place(x=300,y=150)
    adduser_button = Button(window, text="全部解封", command=allunok)
    adduser_button.place(x=300,y=200)
    adduser_button = Button(window, text="刷新", command=update)
    adduser_button.place(x=300, y=250)
    window.mainloop()
def addproblem():
    window = tk.Tk()
    window.title("addproblem")
    window.geometry("800x900")
    window.resizable(False, False)
    tk.Label(window, text='题目序号:').place(x=10, y=10)
    ent0=tk.Entry(window, width=20)
    ent0.place(x=80,y=10)
    tk.Label(window, text='题目编号:').place(x=10, y=35)
    ent1=tk.Entry(window, width=20)
    ent1.place(x=80,y=35)
    tk.Label(window, text='题目名称:').place(x=240, y=35)
    ent2=tk.Entry(window, width=32)
    ent2.place(x=310,y=35)
    tk.Label(window, text='难度:').place(x=550, y=35)
    ent3=tk.Entry(window, width=23)
    ent3.place(x=600,y=35)
    tk.Label(window, text='总分:').place(x=10, y=60)
    ent4 = tk.Entry(window, width=25)
    ent4.place(x=50, y=60)
    tk.Label(window, text='编译时间(s):').place(x=240, y=60)
    ent5 = tk.Entry(window, width=25)
    ent5.place(x=320, y=60)
    tk.Label(window, text='运行时间(ms):').place(x=500, y=60)
    ent6 = tk.Entry(window, width=25)
    ent6.place(x=590, y=60)
    tk.Label(window, text='题目(markdown)').place(x=10, y=85)
    ent7 = tk.Text(window, width=111)
    ent7.place(x=10, y=110,height=740)
    def add():
        id=ent0.get()
        # print(ent7.get(1.0,END))
        f = open(mk + "wxloj\\problems\\" + id + ".ini", "w",encoding="utf-8")
        f.write(ent1.get() + "\n" + ent2.get() + "\n" + ent3.get() + "\n")
        f.close()
        f = open(mk + "wxloj\\problems\\" + id + ".ju", "w",encoding="utf-8")
        f.write(ent4.get() + "\n" + ent5.get() + "\n" + ent6.get() + "\n")
        f.close()
        f = open(mk + "wxloj\\problems\\" + id + ".md", "w",encoding="utf-8")
        f.write(ent7.get(1.0,END)+"\n")
        f.close()
        messagebox.showinfo('提示', '导入题目完成，请自行添加数据文件')
    def opend():
        id = ent0.get()
        if not os.path.exists(mk+"mor\\"+id+"\\"):
            os.mkdir(mk+"mor\\"+id+"\\")
        os.system("start "+mk+"mor\\"+id+"\\")
        # print(mk+"mor\\"+id+"\\")
    adduser_button = Button(window, text="添加", command=add)
    adduser_button.place(x=10,y=860)
    adduser_button = Button(window, text="打开数据点目录", command=opend)
    adduser_button.place(x=60, y=860)
    window.mainloop()
window = tk.Tk()
window.title("admin")
window.geometry("400x400")
window.resizable(False, False)
adduser_button=Button(window,text="通过注册申请",font=("软体雅黑",20),command=adduser)
adduser_button.place(x=100,y=50)
adduser_button=Button(window,text="封禁账号",font=("软体雅黑",20),command=banuser)
adduser_button.place(x=125,y=150)
adduser_button=Button(window,text="添加题目",font=("软体雅黑",20),command=addproblem)
adduser_button.place(x=125,y=250)
window.mainloop()
# addproblem()