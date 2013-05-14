As the secretary, your chief duty is the recording of meeting activities and
discussions, also known as meeting minutes. Minutes are taken at every club
meeting and posted to the website soon afterwards.

Because the website uses git to function, you will need to be at least
partially familiar with git to do this. If you are not, this article will fill
you in.

git is a version control system made by Linus Torvalds for Linux development.
The CLSUG site uses git to update itself; changes submitted to the [central git
repository][1] at GitHub are automatically pulled to the [live site][2]
nightly. (For more information about this, see the webmaster readme.)

To submit minutes, you'll be using git.

Once you push your minutes to the GitHub repository, they will automatically be
included at the live website within a day. This makes life easier for everyone,
but you just need to learn a few things to do it.

So here's a quick tutorial on pushing minutes to the GitHub repository. You'll
need a [GitHub][3] account, and a *nix shell. You'll also need an ssh key to
authenticate with GitHub; just follow GitHub's very helpful instructions
([Linux][4], [OS X][5], [Windows][6]).

Once you've got all that, the rest is easy.

1. Fork the repository. Go to [the CSLUG site repo][1] and, while logged in,
hit "Fork" near the top-right. This creates a copy of the repository under
your own account.

2. Clone your new copy of the repo (replace `<yourusername>` with your GitHub
username):

	git clone git@github.com:<yourusername>/cslug-site
	cd cslug-site

Format minutes in the form `YYYYMMDD` (based on the day of the meeting that the
minutes belong to), so to start writing minutes e.g. in vim for the meeting on
April 11, 2012, do:

	vim minutes/20120411

Minutes are parsed using a markup style called [Markdown][7], which is a nice
way of formatting plain text to look good whether or not it's parsed (in fact,
this document is written in Markdown). You should definitely gloss over the
specs considering you'll be using it once per week, but the most important
thing to take away from it is that bullet points are asterisks, not hyphens,
and basically everything else is natural enough that you'll probably do it
without realizing it (except maybe links, which you should learn to use).

Once you've got your minutes written into your text file, we do four things:

1. `git add minutes/20120411` tells git we want to stage our new file for an
upcoming commit.
2. `git commit -m 'added minutes for April 11, 2012'` commits the staged
changes with the specified commit message.
3. `git push origin master` pushes the new commit to your fork on GitHub.
4. Go to your fork in a browser (http://github.com/<yourusername>/cslug-site/)
and hit the "Pull Request" button next to "Fork". Tag on a message and you're
done.

Pull requests have to be approved, so typically either the webmaster,
president, or vice president will make sure you don't have any mistakes before
accepting it. After that, the change will merge with the central CSLUG repo,
and the live site will pull in the change the next night.

[1]: http://github.com/cslug/cslug-site/
[2]: http://www.ecst.csuchico.edu/cslug/
[3]: http://github.com/
[4]: http://help.github.com/linux-set-up-git/
[5]: http://help.github.com/mac-set-up-git/
[6]: http://help.github.com/win-set-up-git/
[7]: http://daringfireball.net/projects/markdown/
