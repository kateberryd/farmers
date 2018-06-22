#!/bin/bash

lgaCount=16
centerCount=95
wardCount=190

while read p; do
    if [[ ${p:0:1} == "#" ]]; then
        let "lgaCount=lgaCount+1"
        echo "\$lga$lgaCount = \$this->localGovernmentModel->create('${p:1}');"
    elif [[ ${p:0:1} == "$" ]]; then
        let "centerCount=centerCount+1"
        echo "\$center$centerCount = \$this->rCenterModel->create('${p:1}');"
    elif [[ ${p:0:1} == "?" ]]; then
        IFS=',' read -ra ADDR <<< "${p:1}"
        for i in "${ADDR[@]}"; do
            let "wardCount=wardCount+1"
            echo "\$ward$wardCount = \$this->wardModel->create('$i', \$lga$lgaCount, \$center$centerCount);"
        done
    elif [[ ${p:0:1} == "/" ]]; then
        continue
    fi
done <./seeds/WASE.TXT > .output.txt
