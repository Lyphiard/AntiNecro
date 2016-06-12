# Installation
1. Upload the contents of the upload directory into your XenForo base directory
2. Navigate to Admin CP -> Add-ons -> Install Addon, then use the provided XML file to install the addon

# Configuration
Configuration of this addon is done solely through user permissions. This addon will add two user permissions to XenForo: "Can necro own thread" and "Days to reply since last post". Please keep the following things in mind:
* "Can necro own thread" determines whether the creator of the thread may necro the thread. If this is set to true, the owner of the thread may necro the thread regardless of the "Days to reply since last post" permission.
* "Days to reply since last post" is the number of days since the last post to allow a user to reply.
* By default "Days to reply since last post" is set to 0. If this setting is 0 or Unlimited, the user will be able to reply to any thread regardless of the date of the last post.