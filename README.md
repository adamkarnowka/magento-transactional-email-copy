# Magento - Transactional e-mails copy

This simple extension adds massaction column with **2 extra actions** in transactional e-mails grid:

+ **copy template(s)** : You can type prefix and suffix text which will ba added to new template code. It will make 100% accurate copy of selected template(s) and save it under different name (must be unique). This is extremely useful when you add new store and want to create transactional e-mail templates for new one.
+  **delete template(s)** - extra action - from now on, it is possible to mass-delete e-mail templates.

## Screenshot:

![Screenshot](http://www.creativecast.de/ak/2015-01-16_114434.png)

## Rewrite :(

This extension overrides grid block (```Mage_Adminhtml_Block_System_Email_Template_Grid```), so handle with care and look out for potential conflicts.
