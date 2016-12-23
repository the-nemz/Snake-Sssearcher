
def is_ascii(s):
    return all(ord(c) < 128 for c in s)


f2 = open('tempreps2.tab', 'w')
with open('tempreps.tab') as f:
    while True:
        c = f.read(1)
        if not c:
            print('End of file')
            break
        if is_ascii(c):
            f2.write(c)
            # print('Read a character:', c)
        else:
            pass
            # print('nah')

f2.close()
print('done1')

s2 = open('tempsnakes.tab', 'w')
with open('tempreps2.tab') as f3:
    lines = f3.readlines()

# count = 0
for line in lines:
    # if count == 5:
    #     break
    if '(snakes)' in line:
        tabs = line.split('\t')
        if len(tabs[6]) > 2:
            s2.write(line)
        else:
            print(tabs)
        # count += 1

print('alldone')
