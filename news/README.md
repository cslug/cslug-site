news announcements
------------------
This folder holds news announcements that display on the frontpage. The parser
reads files in the following style:

* The filename gets all hyphens replaced with spaces, then gets the first letter
  capitalized, and becomes the news entry title

* The content of the file becomes the news entry content, with no modifications

* The *last modified* date of the file is the news entry's date
