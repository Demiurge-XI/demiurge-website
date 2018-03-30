## Issue Guidelines:
* **Be polite.** You should expect the same kind of attitude you give.
* If your issue is a bug, be clear and concise about what went wrong and what you are in need of help with.
* Not every feature request will be implemented, even if we can write the code for it in our sleep. There are often requests for things that add bloat that we just don't need, or that we have a preferred alternative to.
  * Teo has the final say on what/how features get added.

## Code Contribution Guidelines:
* Wherever possible, stick to CSS and PHP solutions. Keep the javascript to a minimum.
* Use ["editorconfig".](http://editorconfig.org/#download) Most editors have either inbuilt support or a plugin. If yours doesn't, stop using ms word to edit code. :grin:
  * editorconfig will (usually) let you use whitespace format you are used to (tabs or spaces in whatever width you are used to) and then convert them for you on saving the file. But be sure and review your commit before pushing!
  * If you have a problem with the defined styling, you are going to have to battle Teo to change it. To the death. If you *win* that battle, you then have to restyle all the files so they then *match* or ZombieTeo will shank you and eat your brains.
    * A concession was made for javascript styling: that is set to the official standard, because Teo usually doesn't *touch* that anyway.
  * ALWAYS REVIEW YOUR COMMIT!
* Avoid adding any additional language and library requirements to the server: we already have enough under this hood. We are not adding ruby or perl or whatever else you think would let you do that really neat thing you thought of adding.
