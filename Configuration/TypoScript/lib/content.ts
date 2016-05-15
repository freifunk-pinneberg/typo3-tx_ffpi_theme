lib.content = CONTENT
lib.content.table = tt_content
lib.content.select {
	# "sorting" is a column from the tt_content table and
	# keeps track of the sorting order which is given in the backend
	orderBy = sorting
	languageField = sys_language_uid
	# header column
	where.field = colPos
	where.wrap = colPos = |
}
