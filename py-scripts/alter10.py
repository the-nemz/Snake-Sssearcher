
with open('snakedata.tab') as t2:
    lines = t2.readlines()

t3 = open('snakes.tab', 'w')
for line in lines:
    line = line[:-1]
    tabs = line.split('\t')

    if tabs[8] == '1':
        tabs[8] = 'Yes'
    elif tabs[8] == '0':
        tabs[8] = 'No'
    else:
        print('wait wtf')

    if tabs[9] == '1':
        tabs[9] = 'Yes'
    elif tabs[9] == '0':
        tabs[9] = 'No'
    else:
        print('wait wtf')

    out = tabs[0]
    for tab in tabs[1:]:
        if (len(tab) > 254):
            print('\n\nlong:', tab)
            tab = tab[:254]
            print('crop:', tab)
        out += '\t' + tab
    out += '\n'
    t3.write(out)

print('done')
t3.close()
