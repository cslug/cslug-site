Memberlist
----------
This folder holds files that each contain information about a CSLUG member. The
parser reads the files in the following format:

* *Filename (member name):* All underscores are replaced with spaces, then all
  [words][1] are capitalized.

* *File content (member information):* The file's first line is read in as the
  member's position in the club (e.g. `member`). The second line can be blank,
  or can contain a URI (which must start with `http://`) to the member's
  homepage, portfolio or other appropriate personal website.

    * Valid member positions (case-sensitive) are `president`, `vice president`,
      `treasurer`, `secretary`, `webmaster`, `events coordinator`, `academic
      advisor`, `alumnus`, and `member`. (If you're not sure, you're a member.)

An example file entitled `ben_carlsson` follows:

	webmaster
	http://example.com/

If a position isn't recognized, the member is not displayed.

[1]: http://php.net/ucwords
