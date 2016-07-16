## -------- Node Counter ------------
lib.nodecounter = COA
lib.nodecounter {
    10 < plugin.tx_ffpinodecounter_pi1
    10.nodeListFile = http://meshviewer.pinneberg.freifunk.net/data/nodelist.json
    10.templateFile = EXT:ffpi_nodecounter/pi1/templates/counter.html
    10.nodeListExternal = TRUE
}