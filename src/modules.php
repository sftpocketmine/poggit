<?php

/*
 * Poggit
 *
 * Copyright (C) 2016-2017 Poggit
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace poggit;

use poggit\account\GitHubLoginCallbackModule;
use poggit\account\LoginModule;
use poggit\account\LogoutAjax;
use poggit\account\PersistLoginLocAjax;
use poggit\account\SettingsAjax;
use poggit\account\SettingsModule;
use poggit\account\SuAjax;
use poggit\ci\api\AbsoluteBuildIdModule;
use poggit\ci\api\BuildImageModule;
use poggit\ci\api\BuildInfoModule;
use poggit\ci\api\BuildShieldModule;
use poggit\ci\api\GetPmmpModule;
use poggit\ci\api\LoadBuildHistoryAjax;
use poggit\ci\api\ProjectSubToggleAjax;
use poggit\ci\api\ReadmeBadgerAjax;
use poggit\ci\api\ResendLastPushAjax;
use poggit\ci\api\ScanRepoProjectsAjax;
use poggit\ci\api\SearchBuildAjax;
use poggit\ci\api\ToggleRepoAjax;
use poggit\ci\ui\BuildModule;
use poggit\ci\ui\fqn\FqnListModule;
use poggit\debug\AddResourceModule;
use poggit\debug\AddResourceReceive;
use poggit\help\HelpModule;
use poggit\help\HideTosModule;
use poggit\help\LintsHelpModule;
use poggit\help\PmApiListModule;
use poggit\help\PrivateResourceHelpModule;
use poggit\help\ReleaseSubmitHelpModule;
use poggit\help\TosModule;
use poggit\home\HomeModule;
use poggit\japi\ApiModule;
use poggit\module\CsrfModule;
use poggit\module\GitHubApiProxyAjax;
use poggit\module\ProxyLinkModule;
use poggit\module\ResModule;
use poggit\module\RobotsTxtModule;
use poggit\release\details\ReleaseDetailsModule;
use poggit\release\details\ReleaseGetModule;
use poggit\release\details\ReleaseStateChangeAjax;
use poggit\release\details\ReleaseVoteAjax;
use poggit\release\details\review\ReviewAdminAjax;
use poggit\release\details\review\ReviewQueueModule;
use poggit\release\details\review\ReviewReplyAjax;
use poggit\release\index\ReleaseListJsonModule;
use poggit\release\index\ReleaseListModule;
use poggit\release\submit\PluginSubmitAjax;
use poggit\release\submit\RelSubValidateAjax;
use poggit\release\submit\SubmitPluginModule;
use poggit\resource\ResourceGetModule;
use poggit\webhook\GitHubWebhookModule;

// generic
registerModule(CsrfModule::class);
registerModule(LogoutAjax::class);
registerModule(SuAjax::class);
registerModule(PersistLoginLocAjax::class);
registerModule(GitHubApiProxyAjax::class);
registerModule(HomeModule::class);
registerModule(LoginModule::class);
registerModule(SettingsModule::class);
registerModule(SettingsAjax::class);

// api
registerModule(ApiModule::class);

// home and account

// ci: display
registerModule(BuildModule::class);
registerModule(ScanRepoProjectsAjax::class);
registerModule(ToggleRepoAjax::class);
registerModule(LoadBuildHistoryAjax::class);
registerModule(SearchBuildAjax::class);
registerModule(ProjectSubToggleAjax::class);
// ci: browser redirects
registerModule(AbsoluteBuildIdModule::class);
registerModule(GetPmmpModule::class);
// ci: external api (non HTML)
registerModule(BuildImageModule::class);
registerModule(BuildShieldModule::class);
registerModule(FqnListModule::class);
registerModule(BuildInfoModule::class);
// ci: misc
registerModule(ResendLastPushAjax::class);
registerModule(ReadmeBadgerAjax::class);

// release: submit
registerModule(SubmitPluginModule::class);
registerModule(RelSubValidateAjax::class);
registerModule(PluginSubmitAjax::class);
// release: index
registerModule(ReleaseListModule::class);
registerModule(ReleaseListJsonModule::class);
// release: details
registerModule(ReleaseDetailsModule::class);
registerModule(ReleaseGetModule::class);
registerModule(ReleaseStateChangeAjax::class);
registerModule(ReleaseVoteAjax::class);
// release: review
registerModule(ReviewQueueModule::class);
registerModule(ReviewAdminAjax::class);
registerModule(ReviewReplyAjax::class);

// help pages
registerModule(HelpModule::class);
registerModule(PrivateResourceHelpModule::class);
registerModule(LintsHelpModule::class);
registerModule(ReleaseSubmitHelpModule::class);
registerModule(TosModule::class);
registerModule(HideTosModule::class);
registerModule(PmApiListModule::class);

// misc
registerModule(RobotsTxtModule::class);
registerModule(ProxyLinkModule::class);
registerModule(ResModule::class);
registerModule(ResourceGetModule::class);

// GitHub interface
registerModule(GitHubLoginCallbackModule::class);
registerModule(GitHubWebhookModule::class);

if(Meta::isDebug()) {
    registerModule(AddResourceModule::class);
    registerModule(AddResourceReceive::class);
}
