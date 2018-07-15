---
title = "Development log 002 - alpha status"
author = 1
layout = post
categories[] = blog
tags[] = dev
tags[] = log
---

I've been quiet about [Codebot](https://codebot.cc) lately, but that's for a good reason: I was really busy working on it :). This week I was still on vacation and at home, so I was able to work on Codebot almost full-time. I closed almost all open issues on the alpha milestone, which gives the project an “alpha” status. Here's a nice gif:

![Codebot devlog 002 - Overall](http://www.as3gamegears.com/wp-content/uploads/2014/03/codebot_devlog_002_overall.gif)

The main goal of this milestone was to create a code editor powered by a filesystem panel, where the user could open a folder (something like a project), then move, create, delete and edit files/folders. That's the bare minimum I needed to start using Codebot as my day-to-day editor. And I did it! From now on, I will use Codebot to develop Codebot itself instead of using [Brackets](https://brackets.io).

In order to make Codebot usable, I focused on improving and fixing several small details, e.g. a dialog to ask what to do with unsaved changes. Codebot still has a lot of (really) rough edges regarding usability and stability, but it's usable.

Right now I'm working on issues of the beta milestone. Most of them are intended to iron out the application, laying down the foundations for the first release. One of the issues I managed to implement was the stackable panels, which are a key part of the “magic slide panels” idea. Here is a demo:

![Codebot devlog 002 - Stackable panels](http://www.as3gamegears.com/wp-content/uploads/2014/03/codebot_devlog_002_stackable_panels.gif)

This panel is using the first version of the plugin's API, which will be used to create all sorts of awesome features in the future. I'm planning to ship the first release of Codebot with a slide panel about SFX/music.

As a side note, I switched from [CodeMirror](http://codemirror.net) to [Ace](http://ace.c9.io) as the internal code editing lib. That was easier than I expected and as a bonus I got find/replace already built-in:

![Codebot devlog 002 - Find and replace](http://www.as3gamegears.com/wp-content/uploads/2014/03/codebot_devlog_002_find_replace.gif)

I also got lots of themes and an easy way to switch among them:

![Codebot devlog 002 - Themes](http://www.as3gamegears.com/wp-content/uploads/2014/03/codebot_devlog_002_themes.gif)

University classes will start next week, so my development spree will end. After I close all issues in the beta milestone, Codebot should be usable by other developers. When that happens, I will start sending kind e-mails (begging) asking for some feedback :)

There's a lot more to come, stay tuned!

_[This post is a reproduction of the content originally posted on [AS3GameGears](http://www.as3gamegears.com/blog/codebot-an-ide-focused-on-gamedev/).]_
