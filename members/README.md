memberlist
----------
This folder holds files that each contain information about CSLUG members. The
parser reads the files in the following format:

* *Filename (member name):* The first letter and the first letter after each
  hyhen gets capitalized, then each hyphen is replaced with a space.

* *File content (member information):* The first line of the file contains the
  member's club position. A position of "member" is inferred; therefore a blank
  line here or even a blank file is a valid member specification. The second
  line of the file, if present, must be a URL to the member's homepage,
  portfolio, or other website. The third line and everything past it is
  considered an inline description of the member; this is useful if the member
  has no homepage but wishes to say something about himself.

And example file follows:

	member
	http://example.com/

Another example, for a user with no homepage:

	webmaster
	
	This is a description of this user.
	More text

For standard members with no homepage and no description, a blank file suffices.
