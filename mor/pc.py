import shutil
import os
import time
import csv
import psutil
import html
wjc=["system","freopen","fstream","fopen","popen","exec","fork"]
pl=""
def seta(id,s,s1):
    f = open("je\\" + id + ".txt", 'r', encoding='utf-8')
    b = []
    with f as fr:  # 以r形式打开文件
        for line in fr:
            b.append(line.replace('\n', ''))
    f.close()
    f = open("je\\"+id+".txt", 'w')
    f.write(b[0]+"\n"+s+'\n'+s1+pl)
    f.close()
def ml(x):
    if x<1024:
        return str(x)+" B"
    if x<1024*1024:
        return str(int(x/1024*1000)/1000)+" KB"
    return str(int(x/1024/1024*1000)/1000)+" MB"
def set(s,s1,s2,s3):
    global pl
    pl+="\n"+s+" "+s1+" "+s2+" "+s3
def get_pid(name):
    try:
        pids = psutil.process_iter()
        for pid in pids:
            if (pid.name() == name):
                return pid
        return None
    except:
        return None
def info(x):
    time1=time.strftime("%Y-%m-%d %H:%M:%S", time.localtime())
    log="["+time1+"]\"[judger]\" "+x+"\n"
    f=open("info.log","a")
    f.write(log)
    f.close()
ds=10
info("run!")
while 1:
    wj=os.listdir('.\\cpp')
    time.sleep(1)
    # try:
    for w in wj:
        pl=""
        if w.split(".")[-1]!='cpp':
            continue
        info("Find code!")
        print(w+":")
        time.sleep(0.1)
        seta(w.split(".")[0],"Runing","***")
        info("Start parsing the code!")
        b = []
        with open('.\\cpp\\'+w.split(".")[0]+'.ini', "r",encoding='gb18030', errors='ignore') as fr:  # 以r形式打开文件
            for line in fr:
                b.append(line.replace('\n', ''))
        t=0
        mak=b[0]
        cs1=[w]
        shutil.copyfile('.\\cpp\\'+w,'.\\main.cpp')
        v=[]
        with open('.\\main.cpp',"r",encoding='utf-8', errors='ignore') as f:
            for l in f:
                v.append(l.replace("\n",""))
        s=[]
        print("no html:")
        print("\n".join(v))
        for i in v:
            h=html.unescape(i)
            for j in wjc:
                h=h.replace(j,"###zheshiyigeweijinci这是一个违禁词")
            s.append(h)
        w2=open(".\\main.cpp","w")
        w2.write("\n".join(s))
        w2.close()
        info("Code is parsed!")
        print("cpp:")
        print("\n".join(s))
        f=0
        ds=int(len(os.listdir(".\\"+mak+"\\"))/2)
        print(ds)
        info("Start getting parameters!")
        cs = []
        with open('..\\wxloj\\problems\\'+mak+".ju", "r") as f1:
            for l in f1:
                cs.append(l.replace("\n", ""))
        cs_fs=int(cs[0])
        cs_cti = int(cs[1])
        cs_ti = int(cs[2])
        cs_mo=int(cs[3])
        print(cs_ti)
        info("Parameter is successfully obtained!")
        info("[update:info]-text:"+str(cs))
        jf=cs_fs/ds
        info("Compile!")
        os.system('@echo off')
        os.system('start /B /wait E:\Dev-Cpp\MinGW64\\bin\g++.exe ".\\main.cpp" -o ".\\main.exe" -std=c++14  -I"E:\Dev-Cpp\MinGW64\include" -I"E:\Dev-Cpp\MinGW64\\x86_64-w64-mingw32\include" -I"E:\Dev-Cpp\MinGW64\lib\gcc\\x86_64-w64-mingw32\\4.9.2\include" -I"E:\Dev-Cpp\MinGW64\lib\gcc\\x86_64-w64-mingw32\\4.9.2\include\c++" -L"E:\Dev-Cpp\MinGW64\lib" -L"E:\Dev-Cpp\MinGW64\\x86_64-w64-mingw32\lib" -static-libgcc')
        time.sleep(cs_cti)
        os.system("taskkill /pid g++.exe -f")
        if not os.path.isfile('.\\main.exe'):
            shutil.move(".\\cpp\\" + w, ".\\okcpp\\")
            shutil.move(".\\cpp\\" + w.split(".")[0] + ".ini", ".\\okcpp\\")
            seta(w.split(".")[0], "CE","0")
            info("CE!")
            info("Code is ok!")
            continue
        print("Runing!")
        info("Runing!")
        TLC="WA"


        for i in range(0,ds+1):
            if i==0:
                print("Get temp!")
                info("Get temp!")
            else:
                print("Running at #"+str(i))
                info("Running at #"+str(i)+"!")
            shutil.copyfile('.\\'+mak+'\\'+str(max(i,1))+'.in','.\\main.in')
            if i:
                seta(w.split(".")[0], "Running at #"+str(i), "***")
            os.system('start /B main.exe > main.out < main.in ')
            # time.sleep(0.1)
            tl=int(round(time.time() * 1000))
            # print(tl)
            # try:
            time.sleep(0.01)
            pidl=get_pid("main.exe")
            mc=0
            if pidl!=None:#私人程序跑太快了，还没检测到就完事了
                pidl=pidl.pid
                # print(pid1)
                while int(round(time.time() * 1000))-tl<=cs_ti:
                    # print(int(round(time.time() * 1000)))
                    try:
                        time.sleep(0.1)
                        mc=max(mc,int(psutil.Process(pidl).memory_info().rss))
                        if (int(psutil.Process(pidl).memory_info().rss/1024/1024)) >=cs_mo:
                            if i:
                                info("#" + str(i) + " is MLE!")
                                TLC='MLE'
                                set("MLE","0",str(int(round(time.time() * 1000))-tl),">"+ml(psutil.Process(pidl).memory_info().rss))
                            os.system("taskkill /IM main.exe /F")
                    except:
                        break

            print(cs_ti,int(round(time.time() * 1000))-tl)
            # time.sleep(cs_ti)
            # except:
            #     TLC = 'UKE'
            #     continue
            print(mc)
            mc=ml(mc)
            timec=str(int(round(time.time() * 1000))-tl)
            if not os.system("taskkill /IM main.exe /F"):
                if i:
                    TLC='TLE'
                    set("TLE", "0",">"+str(timec),mc)
                    info("#" + str(i) + " is TLE!")
                continue
            if i:
                a = []
                try:
                    if os.path.exists('.\\main.out'):
                        with open('./main.out',"r") as fr:#以r形式打开文件
                            for line in fr:
                                a.append(line.replace('\n',''))
                            #print(a)
                except:
                    info("Error!")
                b = []
                with open('.\\'+mak+'\\'+str(i)+'.out',"r") as fr:#以r形式打开文件
                    for line in fr:
                        b.append(line.replace('\n',''))
                    #print(b)
                #oprint("对于",w,"的第"+str(i)+"个测试点比对完毕")
                if len(a):
                    while a[-1]=="":
                        a=a[0:-1]
                while b[-1]=="":
                    b=b[0:-1]
                if a==b:
                    f+=int(100/ds)
                    info("#"+str(i)+" is ok!")
                    set("AC", str(int(100/ds)),timec,mc)
                else:
                    info("#"+str(i)+" isn't ok!")
                    info("#"+str(i)+":")
                    info("OC:")
                    info("^^^/n^^^".join(b)[0:min(len("^^^/n^^^".join(b))-1,128)])
                    info("IC:")
                    info("^^^/n^^^".join(a)[0:min(len("^^^/n^^^".join(a))-1,128)])
                    set("WA", "0",timec,mc)
                    shutil.copy("./main.in","./"+str(i)+".in")
                    shutil.copy("./main.out","./"+str(i)+".out")
                    shutil.copy('.\\'+mak+'\\'+str(i)+'.out',"./"+str(i)+".ans")
            else:
                print("ok")
                info("Ok!")
        if(f==cs_fs):
            seta(w.split(".")[0],"AC",str(f))
            info("AC")
        else:
            seta(w.split(".")[0], TLC, str(f))
            info(TLC)
        time.sleep(0.1)
        try:
            os.system("taskkill /IM main.exe /F")
            os.remove('./main.exe')
        except:
            print("n1")
            info("Error!")
        try:
            os.remove('./main.in')
        except:
            print("n2")
            info("Error!")
        try:
            os.remove('./main.out')
        except:
            print("n3")
            info("Error!")
        shutil.move(".\\cpp\\"+w,".\\okcpp\\")
        shutil.move(".\\cpp\\" + w.split(".")[0]+".ini", ".\\okcpp\\")
    # except Exception as s:
    #     print(s)
    #     info("Error!")
    #     info("Error:"+str(s)+"!")
    #     shutil.move(".\\cpp\\"+w,".\\okcpp\\")
    #     shutil.move(".\\cpp\\" + w.split(".")[0]+".ini", ".\\okcpp\\")