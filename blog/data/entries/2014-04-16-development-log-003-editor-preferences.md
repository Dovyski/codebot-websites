---
title = "Development log 003 - editor preferences"
author = 1
layout = post
categories[] = blog
tags[] = dev
tags[] = log
---

I took a break from fixing and closing [issues](https://github.com/Dovyski/Codebot/issues?milestone=2&page=1&state=open) in Codebot's TODO list and decided to focus on a few pending things. Since I'm using Codebot to develop Codebot, I had to smooth some of its rough edges to make it more usable.

As a result, I've fixed lots of small annoyances that were getting in my way, such as the ability to save a tab when Cmd+S is pressed or a visual indicator highlighting tabs with unsaved content. While doing that, I spent some time adding love to the layout. Codebot is in alpha state, but it doesn't mean it must be ugly =) The layout still requires a lot of work, but it will be something to do in the future.

After fixing all those small things, I started working on issue [#22 (application preferences)](https://github.com/Dovyski/Codebot/issues/22). It's about Codebot remembering how the user wants it to be, such as tab sizes, if the current line should be highlighted, etc. Below is a screenshot of the current preferences panel:

![Codebot preferences](http://www.as3gamegears.com/wp-content/uploads/2014/04/codebot_devlog_003_preferences.gif)

The editor preferences will be available from the "brain button" (the little cogs at the bottom-right corner in the image). By clicking there a developer will be able to fully customize/tweak Codebot to their needs. Right now the preference panel has a white background, but it will be dark in the near future, such as the following image (from [Webflow](http://interactions.webflow.com/) website):

![Dialog](http://www.as3gamegears.com/wp-content/uploads/2014/04/dialog-182x300.png)

I also worked on internal APIs, such as the one that controls editors. It is used by Codebot to decide what to use to edit a specific file extension. Right now it only has a single editor ([Ace](http://ace.c9.io/)) which is used to open everything, but soon I will add an image visualizer.

I am pretty happy with my develop so far. The API is getting better (after re-factoring small pieces occasionally) and mature enough to receive some cool features, like a slide panel about SFX or assets. I did some research on that and nodejs is packaged with several HTTP libs, which will be useful to implement that panel. My upcoming goals are the preferences panel and, after that, any sliding panel (maybe a OpenGameArt one).

_[This post is a reproduction of the content originally posted on [AS3GameGears](http://www.as3gamegears.com/blog/codebot-an-ide-focused-on-gamedev/).]_
