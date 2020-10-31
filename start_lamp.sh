#!/bin/bash

export no_proxy=.github.com,.getcomposer.org &
$(dirname $0)"/bitnami-lamp/manager-linux-x64.run" &
$(dirname $0)"/bitnami-lamp/use_lampstack"

