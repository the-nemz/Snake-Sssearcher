
with open('groupspecies.tab') as t2:
    lines = t2.readlines()

t3 = open('species.tab', 'w')
for line in lines:
    line = line[:-1]
    tabs = line.split('\t')

    out = tabs[0]
    # for tab in tabs[1:]:
    #     if (len(tab) > 254):
    #         print('\n\nlong:', tab)
    #         tab = tab[:254]
    #         print('crop:', tab)
    #     out += '\t' + tab
    out += '\n'
    t3.write(out)

print('done')
t3.close()
