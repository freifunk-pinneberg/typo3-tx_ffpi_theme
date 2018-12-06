lib.languageNavigation.10 = HMENU
lib.languageNavigation.10 {
    # Create language menu
    special = language
    special.value = 0,1
    special.normalWhenNoLanguage = 0
    wrap = <ul class="languageNavigation">|</ul>
    1 = TMENU
    1 {
        NO = 1
        NO {
            stdWrap.setCurrent = Deutsch || English
            stdWrap.current = 1
            linkWrap = <li> | </li>
            # Aktive Sprache
            ACT < .NO
            ACT.linkWrap = <li class="active">|</li>
            # NO + Übersetzung nicht vorhanden
            USERDEF1 < .NO
            #USERDEF1 <
            USERDEF1.doNotShowLink = 1
            #USERDEF1 < linkWrap =
            #USERDEF1 <
            # ACT + Übersetzung nicht vorhanden
            USERDEF2 < .ACT
            #USERDEF2 < linkWrap =
            #USERDEF2 <
            USERDEF2.doNotShowLink = 1
            #USERDEF2 <
        }
    }
}