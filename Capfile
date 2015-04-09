load 'deploy' if respond_to?(:namespace) # cap2 differentiator

set :client,  'sumocoders'
set :project, 'framework'
set :repository,  "https://github.com/sumocoders/Framework.git"

### DO NOT EDIT BELOW ###

require 'capifony_symfony2'
set :stages,        %w(production staging)
set :default_stage, 'staging'
set :stage_dir,     'app/config'

require 'capistrano/ext/multistage'

load 'deployment/gem'
load 'deployment/deploy'
