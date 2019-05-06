<?php
namespace Aws\GameLift;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon GameLift** service.
 *
 * @method \Aws\Result acceptMatch(array $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptMatchAsync(array $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @method \Aws\Result createBuild(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createBuildAsync(array $args = [])
 * @method \Aws\Result createFleet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createFleetAsync(array $args = [])
 * @method \Aws\Result createGameSession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGameSessionAsync(array $args = [])
 * @method \Aws\Result createGameSessionQueue(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGameSessionQueueAsync(array $args = [])
 * @method \Aws\Result createMatchmakingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createMatchmakingConfigurationAsync(array $args = [])
 * @method \Aws\Result createMatchmakingRuleSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createMatchmakingRuleSetAsync(array $args = [])
 * @method \Aws\Result createPlayerSession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlayerSessionAsync(array $args = [])
 * @method \Aws\Result createPlayerSessions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlayerSessionsAsync(array $args = [])
 * @method \Aws\Result createVpcPeeringAuthorization(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcPeeringAuthorizationAsync(array $args = [])
 * @method \Aws\Result createVpcPeeringConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcPeeringConnectionAsync(array $args = [])
 * @method \Aws\Result deleteAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @method \Aws\Result deleteBuild(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBuildAsync(array $args = [])
 * @method \Aws\Result deleteFleet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFleetAsync(array $args = [])
 * @method \Aws\Result deleteGameSessionQueue(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGameSessionQueueAsync(array $args = [])
 * @method \Aws\Result deleteMatchmakingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMatchmakingConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteScalingPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScalingPolicyAsync(array $args = [])
 * @method \Aws\Result deleteVpcPeeringAuthorization(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcPeeringAuthorizationAsync(array $args = [])
 * @method \Aws\Result deleteVpcPeeringConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcPeeringConnectionAsync(array $args = [])
 * @method \Aws\Result describeAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAliasAsync(array $args = [])
 * @method \Aws\Result describeBuild(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBuildAsync(array $args = [])
 * @method \Aws\Result describeEC2InstanceLimits(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEC2InstanceLimitsAsync(array $args = [])
 * @method \Aws\Result describeFleetAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetAttributesAsync(array $args = [])
 * @method \Aws\Result describeFleetCapacity(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetCapacityAsync(array $args = [])
 * @method \Aws\Result describeFleetEvents(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetEventsAsync(array $args = [])
 * @method \Aws\Result describeFleetPortSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetPortSettingsAsync(array $args = [])
 * @method \Aws\Result describeFleetUtilization(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetUtilizationAsync(array $args = [])
 * @method \Aws\Result describeGameSessionDetails(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameSessionDetailsAsync(array $args = [])
 * @method \Aws\Result describeGameSessionPlacement(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameSessionPlacementAsync(array $args = [])
 * @method \Aws\Result describeGameSessionQueues(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameSessionQueuesAsync(array $args = [])
 * @method \Aws\Result describeGameSessions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameSessionsAsync(array $args = [])
 * @method \Aws\Result describeInstances(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstancesAsync(array $args = [])
 * @method \Aws\Result describeMatchmaking(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMatchmakingAsync(array $args = [])
 * @method \Aws\Result describeMatchmakingConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMatchmakingConfigurationsAsync(array $args = [])
 * @method \Aws\Result describeMatchmakingRuleSets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMatchmakingRuleSetsAsync(array $args = [])
 * @method \Aws\Result describePlayerSessions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describePlayerSessionsAsync(array $args = [])
 * @method \Aws\Result describeRuntimeConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRuntimeConfigurationAsync(array $args = [])
 * @method \Aws\Result describeScalingPolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScalingPoliciesAsync(array $args = [])
 * @method \Aws\Result describeVpcPeeringAuthorizations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVpcPeeringAuthorizationsAsync(array $args = [])
 * @method \Aws\Result describeVpcPeeringConnections(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVpcPeeringConnectionsAsync(array $args = [])
 * @method \Aws\Result getGameSessionLogUrl(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGameSessionLogUrlAsync(array $args = [])
 * @method \Aws\Result getInstanceAccess(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceAccessAsync(array $args = [])
 * @method \Aws\Result listAliases(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @method \Aws\Result listBuilds(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listBuildsAsync(array $args = [])
 * @method \Aws\Result listFleets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFleetsAsync(array $args = [])
 * @method \Aws\Result putScalingPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putScalingPolicyAsync(array $args = [])
 * @method \Aws\Result requestUploadCredentials(array $args = [])
 * @method \GuzzleHttp\Promise\Promise requestUploadCredentialsAsync(array $args = [])
 * @method \Aws\Result resolveAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise resolveAliasAsync(array $args = [])
 * @method \Aws\Result searchGameSessions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchGameSessionsAsync(array $args = [])
 * @method \Aws\Result startFleetActions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startFleetActionsAsync(array $args = [])
 * @method \Aws\Result startGameSessionPlacement(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startGameSessionPlacementAsync(array $args = [])
 * @method \Aws\Result startMatchBackfill(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startMatchBackfillAsync(array $args = [])
 * @method \Aws\Result startMatchmaking(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startMatchmakingAsync(array $args = [])
 * @method \Aws\Result stopFleetActions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopFleetActionsAsync(array $args = [])
 * @method \Aws\Result stopGameSessionPlacement(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopGameSessionPlacementAsync(array $args = [])
 * @method \Aws\Result stopMatchmaking(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopMatchmakingAsync(array $args = [])
 * @method \Aws\Result updateAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAliasAsync(array $args = [])
 * @method \Aws\Result updateBuild(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBuildAsync(array $args = [])
 * @method \Aws\Result updateFleetAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetAttributesAsync(array $args = [])
 * @method \Aws\Result updateFleetCapacity(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetCapacityAsync(array $args = [])
 * @method \Aws\Result updateFleetPortSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetPortSettingsAsync(array $args = [])
 * @method \Aws\Result updateGameSession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGameSessionAsync(array $args = [])
 * @method \Aws\Result updateGameSessionQueue(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGameSessionQueueAsync(array $args = [])
 * @method \Aws\Result updateMatchmakingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMatchmakingConfigurationAsync(array $args = [])
 * @method \Aws\Result updateRuntimeConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuntimeConfigurationAsync(array $args = [])
 * @method \Aws\Result validateMatchmakingRuleSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise validateMatchmakingRuleSetAsync(array $args = [])
 */
class GameLiftClient extends AwsClient {}