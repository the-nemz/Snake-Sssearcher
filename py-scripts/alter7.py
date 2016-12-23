
livebearers = ['Boidae', 'Thamnophis', 'Viperidae', 'Hydrophiinae']

excepts = ['Lachesis', 'Trimeresurus macrolepis', 'Calloselasma', 'Laticauda']


with open('t3snakes.tab') as t3:
    lines = t3.readlines()

t4 = open('t4snakes.tab', 'w')
for line in lines:
    line = line[:-1]
    tabs = line.split('\t')
    added = 0
    for bearer in livebearers:
        if bearer in line:
            for ex in excepts:
                if ex not in line:
                    added = 1
                    tabs.append('1')
                    break
    if added == 0:
        tabs.append('0')

    out = tabs[0]
    for tab in tabs[1:]:
        out += '\t' + tab
    out += '\n'
    if(len(tabs) != 10):
        print(tabs)
    t4.write(out)

print('done')
t4.close()
