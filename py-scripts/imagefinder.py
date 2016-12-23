import http.client, urllib.request, urllib.parse, urllib.error, base64
import json, urllib

with open('speciestest.tab') as fin:
    lines = fin.readlines()

fout = open('speciesimagestest.tab', 'w')

maxlen = 0

for a in range(len(lines)):
    lines[a] = lines[a][:-1]
    species = lines[a]
    # print('~' + lines[a] + '~')

    headers = {
        # Request headers
        'Ocp-Apim-Subscription-Key': '81e192c4939145a08b005223bf662990',
    }

    params = urllib.parse.urlencode({
        # Request parameters
        'q': species,
        'count': '1',
        'offset': '0',
        'mkt': 'en-us',
        'safeSearch': 'Moderate',
    })

    try:
        conn = http.client.HTTPSConnection('api.cognitive.microsoft.com')
        conn.request("GET", "/bing/v5.0/images/search?%s" % params, "{body}", headers)
        response = conn.getresponse()
        bin_data = response.read()
        data = bin_data.decode('utf-8')
        parsed_data = json.loads(data)
        # print(data)
        # print(parsed_data['value'][0]['thumbnailUrl'])
        conn.close()

        tnurl = str(parsed_data['value'][0]['thumbnailUrl'])
        curl = str(parsed_data['value'][0]['contentUrl'])
        cwidth = str(parsed_data['value'][0]['width'])
        cheight = str(parsed_data['value'][0]['height'])
        tnwidth = str(parsed_data['value'][0]['thumbnail']['width'])
        tnheight = str(parsed_data['value'][0]['thumbnail']['height'])

        if (len(curl) > maxlen):
            maxlen = len(curl)

        if (len(tnurl) > maxlen):
            maxlen = len(tnurl)

        out = species + '\t' + curl + '\t' + tnurl + '\t'
        out += cwidth + '\t' + cheight + '\t' + tnwidth + '\t' + tnheight + '\n'
        # print("Good.")
    except Exception as e:
        print(species, e)
        out = species + '\t\t\t0\t0\t0\t0\n'

    fout.write(out)

fout.close()

print('\n\nDone. Max url length:', maxlen, '\n\n')
