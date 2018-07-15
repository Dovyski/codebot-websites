---
title = "Idea of an IDE focused on gamedev"
author = 1
layout = post
categories[] = blog
tags[] = dev
tags[] = log
---

_[This post is a reproduction of the content originally posted on [AS3GameGears](http://www.as3gamegears.com/blog/codebot-an-ide-focused-on-gamedev/).]_

I decided to kick off 2014 with a project that I’ve been willing to develop for a while. I had this idea in 2013 while struggling to overcome some pretty common gamedev tasks. My idea is to create an IDE focused on gamedev. Meet Codebot!

## Why, man, WHY?! There are so many IDEs already!
I know that, but none of them is able to solve most (or all) of my gamedev problems. Developing a game is much more than just coding, you have to tweak art, build levels, convert files, find assets/extensions, read docs about building and publishing, and so on. If you are just like me, anything but code is damn boring.

I don’t like spending time to find out what are the dimensions and formats of thumbnails/icons for Google Play, or what witchcrafts I have to put a PNG file through so it can be accepted by Apple. I don’t like to crawl the internet after SFXs, then discover I need to convert it from WAV to MP3 so it can be used. I don’t like to manually slice assets to extract tiles. My IDE should help me do that, or do it all by itself!

## Uh? I didn’t get your point…
I want something like magic, a magic “sliding panel” to be more precise:

![Very first WIP of Codebot](http://www.as3gamegears.com/wp-content/uploads/2014/01/codebot_ide_001.gif)

Imagine you are working on your Ludum Dare game and you need an 8-bit SFX. You click a button, a panel slides, you type in a few keywords, select what you want and done! Want to create icons to publish your game on Google Play? Slide a panel, add a single 1024×768 PNG image and hit publish. Done, all icons are ready!

That’s the sort of thing I’m trying to achieve. I want an IDE that helps me develop a game, something that minimizes the time I spend working around “non-gamedev” problems. I want to focus on making games.

## Ok, got it! You are insane! It won’t work
I might fail or maybe nobody will use my IDE (including myself, in the worst case scenario :D). That doesn’t bother me at all. I decided to give this project a try because a) it seems damn fun to code and b) it might end up helping others. I coded a lot of things until today, but never a gamedev IDE. I don’t want to create more of the same, I want to create something new.

I have my favorite IDEs now, which include FlashDevelop and Brackets, but they have their own problems: FlashDevelop doesn’t work on Mac, Brackets can’t be used to code As3, and more. Don’t get me wrong, I love them, but I want to try to improve my gamedev experience.

## So what features are you planning?
If you read until this point, you are probably interested on my idea. Thanks! Below is a short list of the features I want Codebot to have (no particular order):

* Create icons in all sizes required by Google, Apple, OUYA, etc using a single PNG image;
* Build to different platforms using as few configuration as possible (e.g. build APK for Android and EXE for Windows, wrapping/compiling them the best way possible);
* Smart files: open a CSV file that describes a level (tilemap), the IDE offers the possibility to render that file if you provide a spritesheet;
* Easily find and download music/SFX using a sliding panel;
* Package sprites into an atlas;
* Extract sprites/tiles from image;
* Easy development steps. E.g. built-in web server for HTML5 gamedev;
* Easily find and add extensions/libs to a project (slide a panel, search, click integrate, done!).

That’s what I have planned so far.

## That’s a lot, how will you develop all that?
My current plan is to implement the code editing parts first, which includes open/saving files, etc. After that I want to start adding building options, starting with Flash/AIR then HTML5. When everything is usable, I will jump into the sliding panels. Probably the first panel will be something to add AIR native extensions to Flash projects.

If you are interested on Codebot, follow its development on this blog and on [Github](https://github.com/Dovyski/Codebot). More technical stuff will come as I progress.
