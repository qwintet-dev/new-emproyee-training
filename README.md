# Qwintet新人研修

Qwintet新人研修プログラム  
主にPHPに関する基礎知識を習得することを目的とする。

## 事前準備

以下のツールを研修前に各自PCにインストールし、  
アカウントの登録を済ませておくこと。

### Git

下記リンクからダウンロードして下さい  
http://git-scm.com/

### virtualbox

下記リンクから自分のPCにあったものをダウンロードして下さい  
http://www.oracle.com/technetwork/server-storage/virtualbox/downloads/index.html?ssSourceSiteId=otnjp

### vagrant

下記リンクから自分のPCにあったものをダウンロードして下さい  
https://www.vagrantup.com/downloads.html

### エディタ

エディタは基本的にPhpStormの利用を推奨します。  
PhpStormは下記リンクからダウンロードして下さい。  
http://www.jetbrains.com/phpstorm/  
  
※使い慣れたものがある場合はそちらを利用しても構いません。

### Githubアカウントの登録

桐木さん詳しい

### travisCIにGithubアカウントを紐付ける

下記リンク先左上の __Sign in with Github__ をクリックするとGithubのサイトに遷移するので、  
遷移先の __Authorize application__ と書かれた緑のボタンをクリックする。  
パスワード入力画面に遷移するので、パスワードを入力してGithubアカウントとtravisのアカウントを紐付ける。  
https://travis-ci.org/

## PCにサーバーを構築

ターミナル（windowsの場合はgitbashを利用）を起動して、以下のコマンドを実行する。  
(しばらく時間がかかります。。。)

```sh
vagrant up
```

ターミナルに`setup successfuly!!`と表示されたら、  
ブラウザから`http://localhost:8080/`にアクセスしてページが表示されることを確認する。

### 構築したサーバの削除・起動・停止・再起動

一度構築したサーバは以下のコマンドをターミナルから実行することで、再起動したり、停止したり出来ます。

```sh
# 起動(初回はサーバの構築も同時に行います)
vagrant up
# 停止
vagrant halt
# 再起動
vagrant reload
# 削除
vagrant destroy -f
```

## リポジトリの設定

このリポジトリを自分のGithubアカウントにforkします（右上のForkボタンをクリック）  
forkしたリポジトリを自分のPCにcloneして課題プログラムを書いていきます。

### travis ci にリポジトリを関連付ける

あとで書く
