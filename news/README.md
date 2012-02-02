news announcements
------------------
This folder holds news announcements that display on the frontpage. The parser
reads files in the following style:

* *Filename (news entry title):* The first letter of the file is capitalized,
  then all hyphens get replaced with spaces.

* *File content (news entry content):* Content is parsed as [Markdown][1] but
  suffers no additional changes.

* *File timestamp (news entry date):* No changes.

[1]: http://daringfireball.net/projects/markdown/
