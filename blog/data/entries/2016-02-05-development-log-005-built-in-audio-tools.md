---
title = "Development log #005 - built-in audio tools"
author = 1
layout = post
thumbnail = /img/posts/thumbnail-devlog-005.jpg
categories[] = blog
tags[] = dev
tags[] = log
tags[] = cloud
---

I've made some good progress on [Codebot](https://codebot.cc) over the last few months. I tried to implement as many planned features as possible, but sometimes the codebase was not that smooth to allow quick iterations. As a consequence, I had to stop, take a look at the big picture and re-factor some (major) pieces here and there.

Eventually I managed to keep the foundation solid enough to advance on implementing my original ideas for Codebot. When developing a game, I tend to spend a significant amount of time tweaking small things, like images, tilemaps, converting sound files, finding assets/SFX, etc. I want Codebot to help me with that so I started working on the built-in tools that will make it possible. For the sake of motivation, I started with audio tools which include a sliding panel to generate SFX and a very simple audio editor.

For the SFX generator, I used [jsfxr](https://github.com/grumdrig/jsfxr), a javascript port of the famous [sfxr](http://www.drpetter.se/project_sfxr.html). After a few hours of work, I had a sliding panel with jsfxr "caged" within:

![Codebot with jsfxr](http://www.as3gamegears.com/wp-content/uploads/2016/02/codebot-jsfxr.jpg)

While working on the panel, I noticed how hard it was to organize and style content, so I re-worked almost from scratch the way panels handle content. I think it is much better now. As a bonus, I developed a set of nice dark UI components to use throughout Codebot. I might even spin this part off  as a standalone lib. Here is the same SFX generator panel, now more polished and based on the new dark UI:

![Codebot Sound Central](http://www.as3gamegears.com/wp-content/uploads/2016/02/codebot-sound-central-wip.jpg)

In order to generate a SFX for a project, the user just needs to open the sliding panel, click a generator (e.g. explosion), tweak it if needed, then finally add the file to the project. It's a simple, quick and painless process. I am really happy having something like that available at a distance of a click during the development of a game. Take a look at this GIF showing the whole process of adding an auto-generated explosion SFX to a project:

![Codebot sound central sliding panel](http://www.as3gamegears.com/wp-content/uploads/2016/02/codebot-sound-central-sfx.gif)

After implementing that, I started working on a simple audio editor. This editor will be displayed when the user double-clicks any audio file within the IDE. For now the editor is only able to play the file, but it will be able cut pieces of the sound (useful for removing silence, for instance). It will also have conversion features, e.g. converting from wav to mp3 formats. The audio editor is in early days of development, so it is not pretty at all, but it's a start:

![Codebot built-in sound editor](http://www.as3gamegears.com/wp-content/uploads/2016/02/codebot-built-in-sound-editor-768x346.jpg)

I already started the search for a few more libs to implement the built-in graphic tools, but that's a topic for another post. Things are taking shape and will be decent and usable in the near future. Stay tuned!

_[This post is a reproduction of the content originally posted on [AS3GameGears](http://www.as3gamegears.com/blog/codebot-an-ide-focused-on-gamedev/).]_
