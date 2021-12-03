from datetime import datetime
import time
import sys
import os

folderpath = sys.argv[1]
tickinterval = 1 

ignored_files = [
    '__init__.py',
    'utilities.py',
]

def do_submit(folderpath):
    files = os.listdir(folderpath)
    for file in files:
        if file.endswith('.py') and file not in ignored_files:
            print(f'[INFO][{datetime.now()}] Executing exploit in {file}!')
            os.system(f'python3 {os.path.join(folderpath, file)} |grep Authenticated')


print(f'[INFO] Folder path set to {folderpath}')

i = 0
while True:
    print(f'[INFO] Submitting for tick {i}')
    do_submit(folderpath)

    i += 1
    print(f'[SLEEP] Sleeping...')
    time.sleep(tickinterval)
    print('\n\n')
