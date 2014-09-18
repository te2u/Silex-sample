Name
====

自分で試してみたSilexに関するプログラム

## 概要

Sliexの調査で実際に書いて試したプログラム。

ブログにまとめたものはこちら。

- [Silexを試してみた(1) - きっかけとインストール - 作業ノート](http://te2u.hatenablog.jp/entry/2014/09/18/132107)
- [Silexを試してみた(2) - 基本的なこと - 作業ノート](http://te2u.hatenablog.jp/entry/2014/09/18/132126)
- [Silexを試してみた(3) - URLを生成する - 作業ノート](http://te2u.hatenablog.jp/entry/2014/09/18/132149)
- [Silexを試してみた(4) - Twig - 作業ノート](http://te2u.hatenablog.jp/entry/2014/09/18/132202)
- [Silexを試してみた(5) - Logging - 作業ノート](http://te2u.hatenablog.jp/entry/2014/09/18/132215)
- [Silexを試してみた(6) - Doctrine DBAL - 作業ノート](http://te2u.hatenablog.jp/entry/2014/09/18/132230)
- [Silexを試してみた(7) - その他と雑感 - 作業ノート](http://te2u.hatenablog.jp/entry/2014/09/18/132304)

## 試した環境

自分が試した環境で、このプログラムに関わるパッケージ。

### OS

CentOS 6.5 x86_64

### packages

- httpd-2.2.15-31
- httpd-devel-2.2.15-31
- httpd-tools-2.2.15-31
- php-5.4.32-1 (remi)
- php-common-5.4.32-1 (remi)
- php-devel-5.4.32-1 (remi)
- php-cli-5.4.32-1 (remi)
- php-pdo-5.4.32-1 (remi)

## 再現方法

1コミットで1ブログエントリーの内容に対応している。

    $ git log
    commit d4ebb622dab0c5524ab89bf68724e144859040e7
    Author: te2u <te2u@users.noreply.github.com>
    Date:   Wed Sep 10 22:40:45 2014 +0900

        Silexを試してみた(6) - Doctrine DBAL

    commit 8e4b760e4970d9cae4dd27eb724ee75ab16fd6f7
    Author: te2u <te2u@users.noreply.github.com>
    Date:   Tue Sep 9 22:11:57 2014 +0900

        Silexを試してみた(5) - Logging

    commit e8aa5b3930c11ba68c5d912c020baa2e3e36f90b
    Author: te2u <te2u@users.noreply.github.com>
    Date:   Thu Sep 4 23:23:16 2014 +0900

        Silexを試してみた(4) - Twig

    commit d56c51eeeef7a5a5e50c94714491fc9c9070132e
    Author: te2u <te2u@users.noreply.github.com>
    Date:   Wed Sep 3 22:58:05 2014 +0900

        Silexを試してみた(3) - URLを生成する

    commit fc1504b8ebf652f79a7347a103b684b416c6ec5d
    Author: te2u <te2u@users.noreply.github.com>
    Date:   Wed Sep 3 22:52:19 2014 +0900

        Silexを試してみた(2) - 基本的なこと

    commit 0eaf6a11e04c3b644d17878039feecbbd5c34b9a
    Author: te2u <te2u@users.noreply.github.com>
    Date:   Mon Sep 1 22:54:12 2014 +0900

        Silexを試してみた(1) - きっかけとインストール

試すときは、該当のコミットを確認してそこからブランチを作成するのが楽。

    $ git checkout -b ch04 e8aa5b3930c11ba68c5d912c020baa2e3e36f90b

## Author

[te2u](https://github.com/te2u)
