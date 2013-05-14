#Secretary
Hello Mr. or Ms. Secretary. You're the person responsible for recording meetings and attending to any of the president's needs. Read on to learn some things about getting your meeting minutes onto the website.

## Getting your meeting minutes onto the website
As the secretary, your chief duty is the recording of meeting activities and
discussions, also known as minutes. Minutes are taken at every club
meeting and are then included on the CSLUG website.

Because the website uses Git to function, you will need to be at least
partially familiar with Git to do this. If you are not, this article will fill
you in. If you are, then you're probably in good shape if you just stop here and read `minutes/README.md`.

The site uses Git to update itself; changes submitted to the [central Git
repository][1] at GitHub are automatically pulled to the [live site][2]
nightly. (For more information about this, see the webmaster README, or ask the webmaster.)

To submit minutes, you'll use Git.

Once you push minutes, they'll be added to the live site within a day. This makes life easier for everyone, but you'll need to learn a few things to do it.

You'll need a [GitHub][3] account, and a *nix shell. You'll also need an ssh key to
authenticate with GitHub; just follow GitHub's very helpful instructions for that
([Linux][4], [OS X][5], [Windows][6]).

Once you've got all that, the rest is easy.

1. Fork the repository. (Go to [the CSLUG site repo][1] and, while logged in,
hit "Fork" near the top-right. This creates a copy of the repository under
your own account.)

2. Clone your new copy of the repo (replace `<yourusername>` with your GitHub
username):

	  git clone git@github.com:<yourusername>/cslug-site
	  cd cslug-site

3. Start writing minutes in a file in the `minutes` folder with a name of the form `YYYYMMDD` (e.g. on April 11, 2012, use a file at `minutes/20120411`). Minutes are parsed using [Markdown][7], which is a nice
way of formatting plain text to look good whether or not it's parsed. You should definitely gloss over the specs. All files in this GitHub repo with the extension `.md` are written in Markdown, if you need any examples.

4. When you're done writing minutes, `git add minutes/20120411` to tell Git we want to stage our new file for an upcoming commit.
2. `git commit -m 'Added minutes for April 11, 2012'` to commit the staged
changes with the specified commit message.
3. `git push origin master` to push the new commit back to your fork on GitHub.
4. Go to your fork in a browser (`http://github.com/<yourusername>/cslug-site`)
and hit the "Pull Request" button next to "Fork". Tag on a message and you're
done.

After all this, the ball is now in the webmaster's court to merge the pull request into the main repository. Once he or she does, the live site should be updated with your changes within 24 hours.

[1]: http://github.com/cslug/cslug-site/
[2]: http://www.ecst.csuchico.edu/cslug/
[3]: http://github.com/
[4]: http://help.github.com/linux-set-up-Git/
[5]: http://help.github.com/mac-set-up-Git/
[6]: http://help.github.com/win-set-up-Git/
[7]: http://daringfireball.net/projects/markdown/
