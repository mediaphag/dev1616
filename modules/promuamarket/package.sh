#!/bin/sh
mkdir promuamarket
cp * promuamarket
cp -r css promuamarket/
cp -r js promuamarket/
cp -r translations promuamarket/
rm promuamarket.zip
zip -r promuamarket.zip promuamarket  -x \*.git\* \*.DS_Store\* \*.idea\* \*.zip
rm -rf promuamarket
