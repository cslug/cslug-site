Webmaster
=========
Hey Mr. Webmaster. You've got the most to learn here, but knowing how the
website works means you can sit back and let it do its sweet, sweet automation
while you've got your feet up.

The gist of it
-----------------------
`cslug-site` takes a bit to understand, but it's actually a pretty small amount of code. Here are some of the reasons we like to keep it around.

* No page on the website needs to ever be manually edited to update the content on the site. All casual changes can be executed without touching any code, which means that you don't really need to do much.

* Any member can add himself or herself to the memberlist by just
making a text file, adding it to their own fork of the website, then opening a
pull request for the change to be merged into the main branch (which is where
you come in). When you merge a pull request, the live site gets updated within 24 hours.

* The secretary doesn't need to send you his or her notes on
every meeting and have you format them into HTML and add them to the 'Minutes'
section of the website (we once did this). The secretary can write his or her
notes in [Markdown][1], then commit them to the repository and have them
appear automatically the next day.

* Similarly, the president doesn't have to ask you to add a news item to the
website; he or she can just write the news item into a text file then commit it and have it appear the next day as well.

[1]: http://daringfireball.net/projects/markdown/

How it works
------------
The core of the site revolves around the ability to parse files into pages. For minutes and news, this is just done with Markdown. For members, each file in the `members` folder represents a member, and the contents of the file represents some information about the member. The site scans all files in `members` and assembles them into a memberlist page. Similar functions are performed for news and minutes.

To find out more about the specifics of the contents of each of these files, check out the READMEs in the `members`, `minutes`, and `news` folders.

The infrastructure
------------------
Keep in mind that everything below applies at the time of this writing. Some things such as server names, URIs, or people may have changed by the time the club is next revived. If you're currently reviving the club and some of this information is incorrect, change it!

The website is hosted on jaguar, the ECST college's primary server. As you've probably guessed, one of the nicest things about the site is that it updates itself without human interaction. To do this, we've set up jaguar to auto-pull the most recent version of the site from GitHub nightly. However, students aren't allowed to set up cron jobs on jaguar, so to get all this auto-updating to work, you have to set up a cron job (`crontab -e`) on a non-school server (I used my media server at home) like the following:

    @daily ssh -i ~/.ssh/id_rsa_np <your_ecst_username>@jaguar.ecst.csuchico.edu "cd /opt/html/htdocs/cslug && git pull origin master"

Adding this line to an external server's crontab file is the only part of automating the site that can't happen on GitHub or jaguar. This line functioning depends on two things:

* You need to have your ECST account granted access to the CSLUG web directory
(`/opt/html/htdocs/cslug`), which can be done by Elbert Chan.

* You need to have a non-passworded SSH key on your machine (located at
`~/.ssh/id_rsa_np`) that is authenticated with jaguar so that you don't need to
enter any passwords or pass phrases when connecting via SSH. To do this, run a
line like the following:

      ssh-keygen -p ~/.ssh/id_rsa_np

  Then don't enter any pass phrase when it asks for one. Copy your public key
to jaguar either manually or with something like

      ssh-copy-id -i ~/.ssh/id_rsa_np.pub <your_ecst_username>@jaguar.ecst.csuchico.edu
      
  Be extremely sure that permissions on the machine you're using are airtight, as allowing a script access to jaguar without the need for a user password is a little bit of a walk on a tightrope.

After all this, the cron should work just fine and any future changes to the GitHub
repository `cslug/cslug-site` will be reflected at the live site
(`www.ecst.csuchico.edu/cslug/`) within 24 hours.

Training
--------
Anyone who wants to update the site with members, minutes, or news will need a basic level of Git knowledge. Assuming the person doesn't have push/pull access to the actual repository and so needs to fork/pull request, the process for them will go like this:

1. Fork the repository onto their GitHub account.
2. `git clone git@github.com:<their_username>/cslug-site`
3. Make the file they want to commit (see the READMEs in the `members`, `minutes`, and `news` folders for more information on file content) and put it in the correct folder.
4. `git add <folder>/<file>` (e.g. `git add members/ben_carlsson`)
5. `git commit -m '<commit message>'` (e.g. `git commit -m 'Added member file for Ben Carlsson'`)
6. `git push origin master`
7. Go to the [`cslug/cslug-site`][2] repo on GitHub.
8. Perform a pull request.

At this point, the ball is in your court to accept or reject the pull request as the webmaster. Make sure you're familiar with the READMEs in each of the three automated areas' folders so that you know what a file in each of the respective folders should look like.

[2]: http://github.com/cslug/cslug-site