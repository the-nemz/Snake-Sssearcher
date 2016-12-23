
def is_ascii(s):
    return all(ord(c) < 128 for c in s)

f2 = open('countries.txt', 'w')
with open('tempcountries.txt') as f:
  while True:
    c = f.read(1)
    if not c:
        print('End of file')
        break
    if is_ascii(c):
        f2.write(c)
        #print('Read a character:', c)
    else:
        pass
        #print('nah')

f2.close()