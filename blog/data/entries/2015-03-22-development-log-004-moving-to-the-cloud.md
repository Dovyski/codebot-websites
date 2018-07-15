---
title = "Development log #004 - moving to the cloud"
author = 1
layout = post
thumbnail = /img/posts/thumbnail-devlog-004.jpg
categories[] = blog
tags[] = dev
tags[] = log
tags[] = cloud
---

After a break of a few months, I finally resumed Codebot development. When I started working on this project, my motivation was the lack of open-source editors that could be easily modified to my needs and run on a variety of platforms. The closest option I had back then was [Brackets](http://brackets.io/), an editor backed by Adobe built on top of web technologies.

I am not going to say I was working to create a better Brackets, but I wanted to try a few ideas of my own. Things changed when Github launched [Atom](http://atom.io/), a hackable editor also built on top of web technologies. Two editors based on similar web technologies indicated that using web stuff to develop an IDE was not a bad idea after all. I had chosen the right foundation for Codebot, which is also based on those technologies. After Atom, continue to work on Codebot as a standalone IDE became pointless.

The reason is quite simple:

![Atom commit log](http://www.as3gamegears.com/wp-content/uploads/2015/03/atom_commit_log.png)

Both Atom and Brackets are strong projects with vibrant communities. They evolve very quickly and their development pace is something I will never be able to follow. As a consequence, I decided to focus on developing Codebot as an IDE that runs on the cloud. It might not evolve as quickly as the other code editors do, but I certainly can add some nice back-end features that still make it a useful tool.

I will stick with my ideas of gamedev sliding panels, but they will be web-based now. Codebot will evolve to become the help you need when you don’t have your regular development machine at hand, for instance. Since I’ve decided to make Codebot run on the cloud, I’ve been working on making it available online. I have a functioning and relatively stable version up and running, but it’s too early to ask for feedback from users.

Here are a few images to show it is all true, otherwise what I said never happened :) First the Codebot website:

![Codebot website](http://www.as3gamegears.com/wp-content/uploads/2015/03/codebot_website-1024x640.png)

And here is its login screen (with Github authentication):

![Codebot login screen](http://www.as3gamegears.com/wp-content/uploads/2015/03/codebot_login_screen-1024x640.png)

I am polishing a few rough edges now, but soon Codebot will be open for Alpha testers. I plan to support two toolchains during the Alpha period: Flash and HTML5. I will talk about them later in a future post.

_[This post is a reproduction of the content originally posted on [AS3GameGears](http://www.as3gamegears.com/blog/codebot-an-ide-focused-on-gamedev/).]_
