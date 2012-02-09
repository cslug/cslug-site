Memberlist
----------
This folder holds files that each contain information about CSLUG members. The
parser reads the files in the following format:

* *Filename (member name):* All underscores are replaced with spaces, then all
  [words][1] are capitalized.

* *File content (member information):* The file's first line is read in as the
  member's position in the club (e.g. `member`). This value is auto-capitalized,
  so please type it in all-lowers to maintain a convention of some sort.
  file's second line can be blank, or can contain a URI (which must start with
  `http://`) to the member's homepage, portfolio or other appropriate personal
  website.

    * Valid member positions are `president`, `vice president`, `treasurer`,
      `secretary`, `webmaster`, `events coordinator`, `academic advisor`,
      and `member`. (If you're not sure, you're a `member`.)

An example file entitled `ben_carlsson` follows:

	member
	http://example.com/

[1]: http://php.net/ucwords
