## -------- Node Counter ------------
#lib.nodecounter = COA
#lib.nodecounter {
#    10 < plugin.tx_ffpinodecounter
#    10.settings.nodeListFile = http://meshviewer.pinneberg.freifunk.net/data/nodelist.json
#    10.settings.nodeListExternal = TRUE
#}

plugin.tx_ffpinodecounter {
    settings.nodeListFile = http://meshviewer.pinneberg.freifunk.net/data/nodes.json
    settings.nodeListExternal = TRUE
}

lib.nodecounter = COA
lib.nodecounter {

    15 < tt_content.list.20.ffpinodecounter_counter
}