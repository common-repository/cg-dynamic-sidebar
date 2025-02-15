=== CG Dynamic Sidebar ===
Contributors: chandan_garg_129
Donate link: http://codersgod.com/author/cdgadmin/
Tags: custom sidebar, sidebar, multiple sidebar, dynamic sidebar, cg dynamic sidebar, my sidebar
Requires at least: 3.6
Tested up to: 5.1
Stable tag: 3.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

CG Dynamic Sidebar helps you to add/create multiple sidebar areas in your admin widgets screen. Easy Installation and Easy management. 

== Description ==

Are you looking for easy and robust way to manage your sidebar areas dynamically from wordpress admin ? CG Dynamic Sidebar is a suite of components which helps you to create your custom sidebar area and allows you to add upto 20 different sidebar areas which you can use them in your website.

CG Dynamic Sidebar is focused on ease of integration and ease of use. It is deliberately powerful plugin using which users can create their own sidebar easily without having any technical knowledge of how to create custom sidebars.
Usage :
<pre> &lt;?php dynamic_sidebar("my-custom-sidebar"); ?&gt; </pre>

== Installation ==

= From WordPress Admin Panel =

1. Click on Add new under Plugin menu.
2. Type CG Dynamic Sidebar in the input field and press enter.
3. Install and Activate CG Dynamic Sidebar from listing.

= From WordPress.org =

1. Download CG Dynamic Sidebar.
2. Upload the 'cg-dynamic-sidebar' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
3. Activate CG Dynamic Sidebar from your Plugins page.

= After Installation and Activation : WordPress dashboard =

1. Visit 'Appearance > Widgets'
2. You will find a button in right side of your admin screen [ Add new sidebar area ]

== Usage ==
While adding your sidebar area you have option to keep your sidebar id, this id will be used to display your custom sidebar in page/post.
If you have added a new sidebar with below details :
Sidebar Title : My Custom Sidebar
Sidebar id : my-custom-sidebar

Then, to use this sidebar, you have to use below PHP code in your sidebar.php or anywhere you want to show this sidebar.
<pre> &lt;?php dynamic_sidebar("my-custom-sidebar"); ?&gt; </pre>

== Frequently Asked Questions ==

= Can I use my existing WordPress theme? =

Yes! CG Dynamic Sidebar works out-of-the-box with nearly every WordPress theme.

= Will this work on WordPress multisite? =

Yes! If your WordPress installation has multisite enabled, CG Dynamic Sidebar will support the global tracking of blogs, posts, comments, and even custom post types with a little bit of custom code.

= Where can I find documentation? =

Our website can be found at <a href="http://codersgod.com/web-plugins/cg-dynamic-sidebar/">http://codersgod.com/web-plugins/cg-dynamic-sidebar/</a>.

= Where can I report a bug? =

Report bugs, suggest ideas, and participate in development at <a href="http://codersgod.com/web-plugins/cg-dynamic-sidebar/">http://codersgod.com/web-plugins/cg-dynamic-sidebar/</a>.

== Upgrade Notice ==
= 3.0 =
We have updated the issues of jQuery while creating the sidebar. Now, you wont face any issue. Upgrade immediately and Enjoy.

= 2.0 =
This version fixes a security related bug.  Upgrade immediately.

== Changelog ==

== Screenshots ==

1. **Creating new sidebar** - It show's the area in your admin widget screen from where you can add your custom sidebar
2. **New sidebar area** - It shows newly created sidebar area in your admin widget screen.
3. **Remove Widget** - It clicked on Remove Sidebar, It will ask for confirmation, if cliked on Remove, it will delete the sidebar or nothing will happen
4. **Adding widget to sidebar** - If you will click on any widget, it will have list of all your sidebar areas to select, you can  select as per your choice and click on add widget to add in your selected sidebar. You can also drag and drop your widget in your custom created sidebar.
5. **Widget Added successfully** - After you added your widget to your sidebar, it will show in your custom create sidebar area.

