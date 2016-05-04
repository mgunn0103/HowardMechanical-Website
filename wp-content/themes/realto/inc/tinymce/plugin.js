(function ()
{
	// create favShortcodes plugin
	tinymce.create("tinymce.plugins.favShortcodes",
	{
		init: function ( ed, url )
		{

		},
		createControl: function ( btn, e )
		{
			if ( btn == "fav_button" )
			{	
				var a = this;

				var btn = e.createSplitButton('fav_button', {
                    title: "Insert Shortcode",
					image: FavShortcodes.plugin_folder +"/images/icon.png",
					icons: false
                });

                btn.onRenderMenu.add(function (c, b)
				{		

					a.addImmediate( b, "Toggles", "[toggle title=\"First Toggle Title\"]<p>YOUR TOGGLE CONTENT HERE!</p>[/toggle][toggle title=\"Second Toggle Title\"]<p>YOUR TOGGLE CONTENT HERE!</p>[/toggle][toggle title=\"Third Toggle Title\"]<p>YOUR TOGGLE CONTENT HERE!</p>[/toggle]" );	
									
					
					a.addImmediate( b, "Buttons", "[button size=\"mini or small or default or large\" type=\"primary or info or success or warning or banger or inverse\" title=\"Button Text\" link_url=\"http://\"]" );
					
					a.addImmediate( b, "RealTo Buttons", "[realtobutton size=\"mini or small or default or large\" title=\"Button Text\" link_url=\"http://\"]" );

					a.addImmediate( b, "BlockQuote","[blockquote]Your Blockquote Text Here![/blockquote]" );

					a.addImmediate( b, "Alert Box", "[alert_box type=\"alert,success,error,info\"]<strong>Warning!</strong> Best check yo self, you're not looking too good. [/alert_box]" );
					
					a.addImmediate(b, "Why Choose Us", "[why_choose_us title=\"Why Choose Us\" link_text=\"Continue\" url=\"http://\"]<p>Your Content Here</p>[/why_choose_us]")
					
					a.addImmediate(b, "Service Box", "[one_third][service_box icon=\"icon class name from Font Awesome List\" title=\"\" link_text=\"Continue\" url=\"http://\"]<p>Your Content Here</p>[/service_box][/one_third]")
					
					a.addImmediate( b, "Home Agents", "[home_agents title=\"Meet our agents\" link_text=\"View profile page\"][/home_agents]" );
					
					a.addImmediate( b, "Home Articles", "[home_articles title=\"Articles from the Blog\" num_of_posts=\"5\"][/home_articles]" );
					
					a.addImmediate( b, "Tagline with Button", "[tagline upper_line=\"\" lower_line=\"\" btn_text=\"Buy It Now!\" btn_link=\"\"]" );
					
					c = b.addMenu({
							title: "Columns"
					});

					//a.addImmediate( b, "Preformatted Code","pre" );
					a.addImmediate( c, "One Half", "[one_half]<p>Your Content Here</p>[/one_half]" );

					a.addImmediate( c, "One Third", "[one_third]<p>Your Content Here</p>[/one_third]" );
					
					a.addImmediate( c, "One Fourth", "[one_fourth]<p>Your Content Here</p>[/one_fourth]" );
					
					a.addImmediate( c, "One Sixth", "[one_sixth]<p>Your Content Here</p>[/one_sixth]" );
					
					a.addImmediate( c, "Columns 3/1", "[third_one]<p>Your Content Here</p>[/third_one]" );
					
					a.addImmediate( c, "Columns 1/3", "[one_fourth]<p>Your Content Here</p>[/one_fourth]" );
					
					
					a.addImmediate( b, "Tabs", "[tabgroup][tab title=\"Tab Title Here 1\"]<p>Tabs Content Here One</p>[/tab][tab title=\"Tab Title Here 2\"]<p>Tabs Content Here Two</p>[/tab][tab title=\"Tab Title Here 3\"]<p>Tabs Content Here Three</p>[/tab][/tabgroup]" );
					
					
				});
                
                return btn;
			}
			
			return null;
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Favethemes Shortcodes',
				author: 'Waqas Riaz',
				authorurl: 'http://themeforest.net/user/favethemes/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add rnrShortcodes plugin
	tinymce.PluginManager.add("favShortcodes", tinymce.plugins.favShortcodes);
})();