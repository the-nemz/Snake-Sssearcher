
def is_ascii(s):
    return all(ord(c) < 128 for c in s)


tcd = open('tempcountrydata.tab', 'w')
with open('tempcountrydata1.tab') as f:
    while True:
        c = f.read(1)
        if not c:
            print('End of file')
            break
        if is_ascii(c):
            tcd.write(c)
            # print('Read a character:', c)
        else:
            pass
            # print('nah')
tcd.close()

with open('tempafrica.txt') as af:
    africa = af.read().splitlines()

with open('tempasia.txt') as asi:
    asia = asi.read().splitlines()

with open('tempeurope.txt') as eu:
    europe = eu.read().splitlines()

with open('tempnamerica.txt') as na:
    namerica = na.read().splitlines()

with open('tempsamerica.txt') as sa:
    samerica = sa.read().splitlines()

with open('tempoceana.txt') as oc:
    oceana = oc.read().splitlines()


cd = open('countrydata.tab', 'w')
with open('tempcountrydata.tab') as rtcd:
    lines = rtcd.read().splitlines()

    for line in lines:
        tabs = line.split('\t')
        prefix = tabs[0] + '\t' + tabs[1] + '\t'

        if tabs[0] in africa:
            out = prefix + 'Africa\n'
            cd.write(out)

        if tabs[0] in asia:
            out = prefix + 'Asia\n'
            cd.write(out)

        if tabs[0] in europe:
            out = prefix + 'Europe\n'
            cd.write(out)

        if tabs[0] in namerica:
            out = prefix + 'North America\n'
            cd.write(out)

        if tabs[0] in samerica:
            out = prefix + 'South America\n'
            cd.write(out)

        if tabs[0] in oceana:
            out = prefix + 'Oceania\n'
            cd.write(out)

cd.close()
print('good data')
