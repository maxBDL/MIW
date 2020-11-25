Outils
=======

|Sommaire|
|--------|
|[:back:](../README.md)|
|[VS Code / VSCodium debugger](#vs-code-/-vscodium-debugger)|
|[Vue-devtools](#vue-devtools)|
|[Plugin Vetur](#plugin-vetur)|

VS Code / VSCodium debugger
---------------------------

### Pour installer les extensions : 
1. Ouvrir VSCodium.
2. Ctrl+P, colle la commande suivante puis presse enter

### firefox
```
ext install firefox-devtools.vscode-firefox-debug
```

### Chrome / Chromium 
```
ext install msjsdiag.debugger-for-chrome
```

### Configuration

1. Ouvrir son répertoire de travail
2. dans le menu latéral de gauche, cliquer sur **Debug** puis **Add Configuration**

Voici un fichier de configuration : launch.json
```json
{
    // Use IntelliSense to learn about possible attributes.
    // Hover to view descriptions of existing attributes.
    // For more information, visit: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        {
            "name": "chromium hurl",
            "type": "chrome",
            "request": "launch",
            "runtimeExecutable": "/usr/bin/chromium",
            "name": "Launch Chrome against localhost",
            "url": "http://localhost/vuejs/test.html",
            "webRoot": "${workspaceFolder}"
        },
        {
            "name": "firefox file ",
            "type": "firefox",
            "request": "launch",
            "reAttach": true,
            "file": "${workspaceFolder}/test.html"
        },
         {
            "name": "firefox url",
            "type": "firefox",
            "request": "launch",
            "reAttach": true,
            "url": "http://localhost/vuejs/test.html",
            "webRoot": "${workspaceFolder}"
        }
    ]
}
```

Vue-devtools
------------
Cette extension de Firefox, Chromium et Chrome permet de visualiser l'arbre des composants, le store vuex, les routes, la performance ...
* [Github](https://github.com/vuejs/vue-devtools)
* [Addon firefox](https://addons.mozilla.org/en-US/firefox/addon/vue-js-devtools/)
* [Extension chromium](https://chrome.google.com/webstore/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd)

Plugin Vetur
------------
ce plugin offre un panel de fonctionnalités : coloration syntaxique, prise en charge des composant monofichier `*.vue`, ...

* [Doc officielle](https://vuejs.github.io/vetur/)
* [Github](https://github.com/vuejs/vetur)
* [coc-nvim](https://github.com/neoclide/coc-vetur)
