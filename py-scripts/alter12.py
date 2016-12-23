
with open('snakesall.tab') as t2:
    lines = t2.readlines()

species = []
# snake = open('snake.tab', 'w')
lives = open('lives.tab', 'w')
for line in lines:
    line = line[:-1]
    tabs = line.split('\t')

    snakeout = tabs[0]
    livesout = tabs[0]
    write = False

    for i, tab in enumerate(tabs):
        if (i == 0) and tab not in species:
            write = True
            species.append(tab)
        elif (i == 7):
            livesout += '\t' + tab
        else:
            snakeout += '\t' + tab

    snakeout += '\n'
    print('~' + livesout + '~')
    livesout += '\n'
    lives.write(livesout)
    if (write):
        # snake.write(snakeout)
        pass

print('done')
# snake.close()
lives.close()
