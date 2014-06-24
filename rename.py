import os

d = '/var/www/php/weixin/app/views/shop/default'
for files in os.listdir(d):
	dd = "%s/%s"%(d,files)
	for f in os.listdir(dd):
		b = f.split('.')[0]
		newfile = "%s.%s.%s"%(b, 'blade', 'php')
		os.rename(os.path.join(dd, f), os.path.join(dd, newfile))
