---
title = "Development log #001 - foundation"
author = 1
layout = post
categories[] = blog
tags[] = dev
tags[] = log
---

Codebot development has been on fire! It's been 3 weeks since I started the project and I've managed to find some free time (and a lot of effort) to accomplish my first milestone. As I initially described, my priority goal is to lay down the foundation of a text editor, which involves everything related to writing/reading text files.

Below is a screenshot of my current progress:

![Codebot  pre-alpha 002](http://www.as3gamegears.com/wp-content/uploads/2014/01/codebot_dev_pre_alpha_002.png)

I've already implemented the following features:

* Choose a folder to be listed on “files panel” (white panel on the right);
* Open, edit and save files;
* Keep several files open at the same time using tabs to switch between them;
* Move files and folders around in the “files panel” (used to re-structure a project, for instance);
* Rename files/folders in the “files panel”;
* Use a JSON file to store the IDE preferences (e.g. smart indentation, tab size, etc).

Under the hood there is a lot of code to implement all that and still make sure Codebot will be able to run on different platforms. Despite that, I focused on getting it to work on a single platform (Mac) at first. When things are working the way they should, I can spend some time implementing the missing IO layers.

In order to make Codebot a complete text editor, I must implement the following:

* Create new files/folders using shortcuts or the “files panel”;
* Save a file without closing it;
* Manager for shortcuts (that's an optional task, but I'll probably implement it anyway)

Unfortunately the exams season is about to begin at the university, which will drastically reduce my free time. I hope to implement the remaining tasks until I run out of free time.

In the next post I will dissect Codebot structure and expose the libs and technologies I'm using or planning to use.

_[This post is a reproduction of the content originally posted on [AS3GameGears](http://www.as3gamegears.com/blog/codebot-an-ide-focused-on-gamedev/).]_
