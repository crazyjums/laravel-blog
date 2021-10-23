#!/bin/bash

time=$(date "+%Y-%m-%d %H:%M:%S")
git add .
git commit -m "commit by shell at ${time}"
git push origin master