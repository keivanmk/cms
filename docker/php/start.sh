#!/usr/bin/env bash
set -e

env=${APP_ENV:-prodction}

if [ "$env" != "local" ]; then
  echo "Caching Configurations ..."
fi
