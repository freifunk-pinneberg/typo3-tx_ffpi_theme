## -------- Footer Navigation -------
lib.footernavigation.10 = HMENU
lib.footernavigation.10 {

	entryLevel = 0

	special = directory
	special.value = 34 #{TSFE:page|pid}

	1 = TMENU
	1.wrap = <ul> | </ul>
	#1.expAll = 1
	1 {
			noBlur = 1
			NO {
				subst_elementUid = 1
				allWrap = <li id="link{elementUid}" class="first">| |*| <li id="link{elementUid}">| |*| <li id="link{elementUid}" class="last">|
				wrapItemAndSub = |</li>
				allStdWrap.postUserFunc = user_functions->user_modifyToExternalUrl
			}
			ACT = 1
			ACT {
				subst_elementUid = 1
				allWrap = <li id="link{elementUid}" class="first active first_active">| |*| <li id="link{elementUid}" class="active">| |*| <li id="link{elementUid}" class="last active last_active">|
				wrapItemAndSub = |</li>
			}
	}
}