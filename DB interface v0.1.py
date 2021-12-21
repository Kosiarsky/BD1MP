from tkinter import *
from cx_Oracle import *
from tkinter import messagebox
from functools import partial

connection = connect('SYSTEM/PASSWORD@localhost')
cur = connection.cursor()

window = Tk()
window.title("Oracle DB GUI")
window.geometry("300x300+300+300")

def query(n_string, s_string, g_string):
    q = Toplevel(window)
    q.geometry(g_string)
    q.title(n_string)
    cur.execute(s_string)
    results = cur.fetchall()
    results = '\n'.join(map(str, results))
    Label(q, text = results).pack()

def submitAdres(Adres_id, Adres_kraj, Adres_wojewodztwo, Adres_miasto, Adres_ulica, Adres_nr_d, Adres_kod_p):
    try:
        cur.execute("INSERT INTO adresy VALUES (:Adres_id, :Adres_kraj, :Adres_wojewodztwo, :Adres_miasto, :Adres_ulica, :Adres_nr_d, :Adres_kod_p)",
        {
            'Adres_id' : Adres_id.get(), 'Adres_kraj' : Adres_kraj.get(), 'Adres_wojewodztwo' : Adres_wojewodztwo.get(), 'Adres_miasto' : Adres_miasto.get(), 'Adres_ulica' : Adres_ulica.get(), 'Adres_nr_d' : Adres_nr_d.get(), 'Adres_kod_p' : Adres_kod_p.get()
        })
    except Exception as e:
        messagebox.showerror("Error", str(e))
    else:
        connection.commit()
        Adres_id.delete(0, END); Adres_kraj.delete(0, END); Adres_wojewodztwo.delete(0, END); Adres_miasto.delete(0, END); Adres_ulica.delete(0, END); Adres_nr_d.delete(0, END); Adres_kod_p.delete(0, END)

def createAdres():
    crtADR = Toplevel(window)
    crtADR.geometry('325x350+450+450')
    Text = Label(crtADR, text = "Insert adres")
    Text.place(x = 123, y = 0)
    Text.config(font =("lucida", 12))
    Text = Label(crtADR, text = "ID")
    Text.place(x = 155, y = 20)
    Adres_id = Entry(crtADR)
    Adres_id.place(x = 102, y = 40)
    Text = Label(crtADR, text = "Kraj")
    Text.place(x = 150, y = 60)
    Adres_kraj = Entry(crtADR);
    Adres_kraj.place(x = 102, y = 80)
    Text = Label(crtADR, text = "Wojewodztwo")
    Text.place(x = 127, y = 100)
    Adres_wojewodztwo = Entry(crtADR)
    Adres_wojewodztwo.place(x = 102, y = 120)
    Text = Label(crtADR, text = "Miasto")
    Text.place(x = 145, y = 140)
    Adres_miasto = Entry(crtADR)
    Adres_miasto.place(x = 102, y = 160)
    Text = Label(crtADR, text = "Ulica")
    Text.place(x = 145, y = 180)
    Adres_ulica = Entry(crtADR)
    Adres_ulica.place(x = 102, y = 200)
    Text = Label(crtADR, text = "Numer domu")
    Text.place(x = 127, y = 220)
    Adres_nr_d = Entry(crtADR)
    Adres_nr_d.place(x = 102, y = 240)
    Text = Label(crtADR, text = "Kod pocztowy")
    Text.place(x = 127, y = 260)
    Adres_kod_p = Entry(crtADR)
    Adres_kod_p.place(x = 102, y = 280)
    buttonSUB = Button(crtADR, text = "Submit Adres", command = partial(submitAdres, Adres_id, Adres_kraj, Adres_wojewodztwo, Adres_miasto, Adres_ulica, Adres_nr_d, Adres_kod_p))
    buttonSUB.place(x = 122.5, y = 310)

button1 = Button(window, text = "* query", command = partial(query, "Nazwa 1", "SELECT * FROM adresy", '500x500'))
button1.place(x = 0, y = 0)
button2 = Button(window, text = "Imie query", command = partial(query, "Nazwa 2", "SELECT * FROM adresy", '500x500'))
button2.place(x = 50, y = 0)

ButtonInsertAdres = Button(window, text = "Insert Adres", command = createAdres)
ButtonInsertAdres.place(x = 0, y = 50)

window.mainloop()
cur.close()
connection.close()
