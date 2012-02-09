cslug-site
----------
This is the code for the website of the Chico State Linux User Group (CSLUG).
The site is new as of Spring '12; for the old site's source, check the
`2010site` branch.

The [live site][1] auto-pulls the latest commits from this repo nightly.

[1]: http://www.ecst.csuchico.edu/cslug/

Contributing
-----------------
To contribute, just fork and do whatever you want, then pull request. Don't be
shy with it; if you see something that could be better, make it better and rub
it in everyone's faces afterwards for the warm fuzzies. Remember that this
is a club project -- don't make suggestions; make changes.

If you're new to git, don't be intimidated. GitHub has [very helpful
instructions][1] on forking repositories, and it's the easiest way (for both
parties) to merge contributed/fixed code.

If you're a member looking to add yourself to the site's memberlist, just fork
us, add/commit/push your member file according to [the memberfile README][2],
then submit a pull request.

[1]:http://help.github.com/fork-a-repo/
[2]:https://github.com/cslug/cslug-site/tree/master/members

Some quick code structure bullets
-----------------------------------------------
* All page requests go through `index.php`, which handles headers/footers/all
  that joy.
* HTML/CSS is compartmentalized into template-esque files in `html`, which are
  eventually parsed by the `Template` class.
* The members, minutes, and news pages grab data from their respective folders
  -- see each folder's README for more info.
* This project uses [tabs for indentation and spaces for alignment][1]. (You
  might want to tell your editor to display tab characters -- e.g. [vim][2])

[1]: http://www.iovene.com/61/
[2]: https://github.com/skoh-fley/dotfiles/blob/b3f89f19de2b82e0f7fd33e5b88627c473efc457/.vimrc#L37
